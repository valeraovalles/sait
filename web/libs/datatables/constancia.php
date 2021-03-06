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
    $aColumns = array( 'fechasolicitud', 'primer_nombre','primer_apellido','cedula','tipo', 'culminada' );
     
    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "fechasolicitud";
     
    /* DB table to use */
    $sTable = "constancia.constancia c, usuarios.perfil p, usuarios.user u";
     
    /* Database connection information */
    $gaSql['user']       = "postgres";
    $gaSql['password']   = "..*t3l35ur*..";
    #$gaSql['password']   = "postgres";
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
                $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
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

        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $_GET['bSearchable_'.$i] == "true" )
            {
                if($_GET['sSearch']=='cerrada')
                    $_GET['sSearch']='true';
                else if($_GET['sSearch']=='nueva')
                    $_GET['sSearch']='false';
                $sWhere .= "CAST(".$aColumns[$i]." AS TEXT) ILIKE '%".pg_escape_string( $_GET['sSearch'] )."%' OR ";
            }

        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ")";
    }
     

    /* Individual column filtering */
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
        {
             str_replace(array('cerrada','nueva'), array(true,false), $_GET['sSearch_5']);
            
            if ( $sWhere == "" )
            {
                $sWhere = "WHERE ";
            }
            else
            {
                $sWhere .= " AND ";
            }
            $sWhere .= $aColumns[$i]." ILIKE '%".pg_escape_string($_GET['sSearch_'.$i])."%' ";
        }
    }

    if($sWhere=="") $sWhere="where c.user_id=p.id and p.id=u.id and u.is_active=true";
    else $sWhere .=" and c.user_id=p.id and p.id=u.id and u.is_active=true";

    $sQuery = "
        SELECT ".str_replace(" , ", " ", implode(", ", $aColumns)).", c.id as idconstancia, c.culminada
        FROM   $sTable
        $sWhere
        $sOrder
        $sLimit
    ";

    $rResult = pg_query( $gaSql['link'], $sQuery ) or die(pg_last_error());

    $sQuery = "
        SELECT $sIndexColumn
        FROM   $sTable
        $sWhere
    ";
    $rResultTotal = pg_query( $gaSql['link'], $sQuery ) or die(pg_last_error());
    $iTotal = pg_num_rows($rResultTotal);
    pg_free_result( $rResultTotal );
     
    if ( $sWhere != "" )
    {
        $sQuery = "
            SELECT $sIndexColumn
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
     
    while ( $aRow = pg_fetch_array($rResult, null, PGSQL_ASSOC) )
    {
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $aColumns[$i] == "version" )
            {
                /* Special output formatting for 'version' column */
                $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
            }
            else if ( $aColumns[$i] != ' ' )
            {
                /* General output */
                $row[] = $aRow[ $aColumns[$i] ];


                if($i==5){
                    if($aRow['culminada']=='f')
                        $estatus='<span style="display:none;">1-</span><span class="label label-danger">Nueva</span>';
                    else
                        $estatus='<span style="display:none;">2-</span><span class="label label-success">Cerrada</span>';
                $row[5] =$estatus;
                $row[] = "<a href='".$aRow['idconstancia']."/show'><span class='glyphicon glyphicon-eye-open'></span></a>
                          <a href='edit/".$aRow['idconstancia']."'><span class='glyphicon glyphicon-pencil'></span></a>
                          <a href='pdf/".$aRow['idconstancia']."'><img style='width:18px;' src='/sait/web/images/pdf.gif'></a>"; 
                }
            }
        }
        $output['aaData'][] = $row;
    }
     

    echo json_encode( $output );
     

    // Free resultset
    pg_free_result( $rResult );
     
    // Closing connection
    pg_close( $gaSql['link'] );


    //http://localhost/sait/web/libs/datatables/avila.php?sEcho=1&iDisplayStart=0&iDisplayLength=10&bSortable=false&sSearch=&bSearchable_0=false&bSearchable_1=false&bSearchable_2=false&bSearchable_3=false&bSearchable_4=false&bSearchable_5=false