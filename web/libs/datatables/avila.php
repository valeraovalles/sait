<?php
    /*
     * Script:    DataTables server-side script for PHP and PostgreSQL
     * Copyright: 2010 - Allan Jardine
     * License:   GPL v2 or BSD (3-point)
     */
     
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * Easy set variables
     */
     
    /* Array of database columns which should be read and sent back to DataTables. Use a space where
     * you want to insert a non-database field (for example a counter or static image)
     */
    $aColumns = array( 'ubicacion_cinta', 'serial_cinta', 'titulo', 'formato', 'evento', 'servicio','id_segmento', 'contenido_segmento','titulo_complementario' );
    $bColumns = array( 'c.cota', 'c.id', 'p.titulo', 'f.formato', 'e.evento', 'se.servicio','s.alias','s.contenido','p.tcc');
     
    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "c.cota";
     
    /* DB table to use */
    $sTable = "avila.db_cinta c, avila.db_segmentos s, avila.db_ppal p, avila.db_formato f, avila.db_evento e, avila.db_servicio se";
     
    /* Database connection information */
    $gaSql['user']       = "postgres";
    #$gaSql['password']   = "..*t3l35ur*..";
    $gaSql['password']   = "postgres";
    $gaSql['db']         = "sait";
    $gaSql['server']     = "localhost";
     
     
     
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP server-side, there is
     * no need to edit below this line
     */
     
    /*
     * DB connection
     */
    $gaSql['link'] = pg_connect(
        " host=".$gaSql['server'].
        " dbname=".$gaSql['db'].
        " user=".$gaSql['user'].
        " password=".$gaSql['password']
    ) or die('Could not connect: ' . pg_last_error());
     
     
    /*
     * Paging
     */
    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".intval( $_GET['iDisplayLength'] )." OFFSET ".
            intval( $_GET['iDisplayStart'] );
    }
     
     
    /*
     * Ordering
     */
    $sOrder = "";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $bColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc').", ";
            }
        }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
    }
     
     
    /*
     * Filtering
     * NOTE This assumes that the field that is being searched on is a string typed field (ie. one
     * on which ILIKE can be used). Boolean fields etc will need a modification here.
     */
    $sWhere = "";
    if ( $_GET['sSearch'] != "" )
    {
        $sWhere = "WHERE (";
        for ( $i=0 ; $i<count($bColumns) ; $i++ )
        {
            if ( $_GET['bSearchable_'.$i] == "true" )
            {
                $sWhere .= "CAST(".$bColumns[$i]." AS TEXT) ILIKE '%".pg_escape_string( $_GET['sSearch'] )."%' OR ";
            }
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ")";
    }
     
    /* Individual column filtering */
    for ( $i=0 ; $i<count($bColumns) ; $i++ )
    {
        if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
        {
            if ( $sWhere == "" )
            {
                $sWhere = "WHERE ";
            }
            else
            {
                $sWhere .= " AND ";
            }
            $sWhere .= $bColumns[$i]." ILIKE '%".pg_escape_string($_GET['sSearch_'.$i])."%' ";
        }
    }
     
    if($sWhere=='') $sWhere='WHERE c.id=s.id and p.alias=s.alias and c.id_formato=f.id and c.evento=e.id and c.servicio=se.id';
    else $sWhere .=' and c.id=s.id and p.alias=s.alias and c.id_formato=f.id and c.evento=e.id and c.servicio=se.id';

     
    $sQuery = "
        SELECT c.cota as ubicacion_cinta, c.id as serial_cinta, p.titulo, f.formato, e.evento, se.servicio,s.contenido as contenido_segmento,s.alias as id_segmento,p.tcc as titulo_complementario
        FROM   $sTable
        $sWhere
        $sOrder
        $sLimit
    ";
 

    $rResult = pg_query( $gaSql['link'], $sQuery ) or die(pg_last_error());
     

    $sQuery = "
        SELECT c.cota as ubicacion_cinta, c.id as serial_cinta, p.titulo, f.formato, e.evento, se.servicio,s.contenido as contenido_segmento,s.alias as id_segmento,p.tcc as titulo_complementario
        FROM   $sTable
        $sWhere
    ";

    $rResultTotal = pg_query( $gaSql['link'], $sQuery ) or die(pg_last_error());
    $iTotal = pg_num_rows($rResultTotal);
    pg_free_result( $rResultTotal );
         
    if ( $sWhere != "" )
    {
        $sQuery = "
            SELECT c.cota as ubicacion_cinta, c.id as serial_cinta, p.titulo, f.formato, e.evento, se.servicio,s.contenido as contenido_segmento,s.alias as id_segmento,p.tcc as titulo_complementario
            FROM   $sTable
            $sWhere
        ";
        $rResultFilterTotal = pg_query( $gaSql['link'], $sQuery ) or die(pg_last_error());
        $iFilteredTotal = pg_num_rows($rResultFilterTotal);
        pg_free_result( $rResultFilterTotal );
    }
    else
    {
        $iFilteredTotal = $iTotal;
    }
     
     
     
    /*
     * Output
     */
    $output = array(
        "sEcho" => intval($_GET['sEcho']),
        "iTotalRecords" => $iTotal,
        "iTotalDisplayRecords" => $iFilteredTotal,
        "aaData" => array()
    );
     
    // echo $iTotal; die;
    while ( $aRow = pg_fetch_array($rResult, null, PGSQL_ASSOC) )
    {
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {   
            if($i==0)
                $id=$aRow[ $aColumns[$i]];

            if ( $aColumns[$i] == "version" )
            {
                /* Special output formatting for 'version' column */
                $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
            }
            else if ( $aColumns[$i] != ' ' )
            {

                    $row[] = $aRow[ $aColumns[$i] ];

                    if($i==8)
                    $row[] = "<a href='consulta/".$id."'><span class='glyphicon glyphicon-eye-open'></a>";    
            }
        }
        $output['aaData'][] = $row;
    }
     


    echo json_encode( $output );
     
    // Free resultset
    pg_free_result( $rResult );
     
    // Closing connection
    pg_close( $gaSql['link'] );
?>