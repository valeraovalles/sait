<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/licencias')) {
            if (0 === strpos($pathinfo, '/licencias/reportes')) {
                // licencias_homepage
                if ($pathinfo === '/licencias/reportes/principal') {
                    return array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\LicenciasController::indexAction',  '_route' => 'licencias_homepage',);
                }

                // licencias_show
                if (preg_match('#^/licencias/reportes/(?P<id>[^/]++)/(?P<retorno>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'licencias_show')), array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\LicenciasController::showAction',));
                }

            }

            if (0 === strpos($pathinfo, '/licencias/modif')) {
                // licencias_new
                if ($pathinfo === '/licencias/modif/new') {
                    return array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\LicenciasController::newAction',  '_route' => 'licencias_new',);
                }

                // licencias_create
                if ($pathinfo === '/licencias/modif/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_licencias_create;
                    }

                    return array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\LicenciasController::createAction',  '_route' => 'licencias_create',);
                }
                not_licencias_create:

                // licencias_edit
                if (preg_match('#^/licencias/modif/(?P<id>[^/]++)/(?P<retorno>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'licencias_edit')), array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\LicenciasController::editAction',));
                }

                // licencias_update
                if (preg_match('#^/licencias/modif/(?P<id>[^/]++)/(?P<retorno>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_licencias_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'licencias_update')), array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\LicenciasController::updateAction',));
                }
                not_licencias_update:

                // licencias_delete
                if (preg_match('#^/licencias/modif/(?P<id>[^/]++)/(?P<retorno>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'licencias_delete')), array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\LicenciasController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/licencias/reportes')) {
                // licencias_vencidas
                if ($pathinfo === '/licencias/reportes/vencidas') {
                    return array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\LicenciasController::vencidasAction',  '_route' => 'licencias_vencidas',);
                }

                if (0 === strpos($pathinfo, '/licencias/reportes/p')) {
                    // licencias_por_vencer
                    if ($pathinfo === '/licencias/reportes/por/vencer') {
                        return array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\LicenciasController::porvencerAction',  '_route' => 'licencias_por_vencer',);
                    }

                    // reporte_pdf
                    if ($pathinfo === '/licencias/reportes/pdf') {
                        return array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\LicenciasController::vencidasAction',  '_route' => 'reporte_pdf',);
                    }

                }

            }

            // correo
            if ($pathinfo === '/licencias/envio/correo') {
                return array (  '_controller' => 'LicenciasBundle:Correo:envio',  '_route' => 'correo',);
            }

        }

        if (0 === strpos($pathinfo, '/visitas')) {
            // visita_control
            if (rtrim($pathinfo, '/') === '/visitas') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'visita_control');
                }

                return array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\VisitaController::indexAction',  '_route' => 'visita_control',);
            }

            // visita_show_control
            if (preg_match('#^/visitas/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'visita_show_control')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\VisitaController::showAction',));
            }

            // visita_new_control
            if ($pathinfo === '/visitas/new') {
                return array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\VisitaController::newAction',  '_route' => 'visita_new_control',);
            }

            // visita_create_control
            if ($pathinfo === '/visitas/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_visita_create_control;
                }

                return array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\VisitaController::createAction',  '_route' => 'visita_create_control',);
            }
            not_visita_create_control:

            // visita_edit_control
            if (preg_match('#^/visitas/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'visita_edit_control')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\VisitaController::editAction',));
            }

            // visita_update_control
            if (preg_match('#^/visitas/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_visita_update_control;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'visita_update_control')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\VisitaController::updateAction',));
            }
            not_visita_update_control:

            // visita_delete_control
            if (preg_match('#^/visitas/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_visita_delete_control;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'visita_delete_control')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\VisitaController::deleteAction',));
            }
            not_visita_delete_control:

            // control_visitas_usuario
            if ($pathinfo === '/visitas/listado') {
                return array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::indexAction',  '_route' => 'control_visitas_usuario',);
            }

            // usuario_show_control
            if (preg_match('#^/visitas/(?P<id>[^/]++)/showusuario$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_show_control')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::showAction',));
            }

            // usuario_new_control
            if ($pathinfo === '/visitas/newusuario') {
                return array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::newAction',  '_route' => 'usuario_new_control',);
            }

            // usuario_create_control
            if ($pathinfo === '/visitas/createusuario') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_usuario_create_control;
                }

                return array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::createAction',  '_route' => 'usuario_create_control',);
            }
            not_usuario_create_control:

            // usuario_edit_control
            if (preg_match('#^/visitas/(?P<id>[^/]++)/editusuario$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_edit_control')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::editAction',));
            }

            // usuario_update_control
            if (preg_match('#^/visitas/(?P<id>[^/]++)/updateusuario$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_usuario_update_control;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_update_control')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::updateAction',));
            }
            not_usuario_update_control:

            // usuario_delete_control
            if (preg_match('#^/visitas/(?P<id>[^/]++)/deleteusuario$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_usuario_delete_control;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_delete_control')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::deleteAction',));
            }
            not_usuario_delete_control:

            // usuario_busqueda_control
            if ($pathinfo === '/visitas/busqueda') {
                return array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::busquedaAction',  '_route' => 'usuario_busqueda_control',);
            }

            // usuario_encontrado_control
            if ($pathinfo === '/visitas/encontrado') {
                return array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::encontradoAction',  '_route' => 'usuario_encontrado_control',);
            }

        }

        if (0 === strpos($pathinfo, '/distribucion')) {
            // distribucion_homepage
            if ($pathinfo === '/distribucion/inicio') {
                return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\DefaultController::indexAction',  '_route' => 'distribucion_homepage',);
            }

            // ajax
            if (0 === strpos($pathinfo, '/distribucion/ajax') && preg_match('#^/distribucion/ajax/(?P<datos>[^/]++)/(?P<mostrar>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajax')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\AjaxController::formularioAction',));
            }

            // pais_estado_ciudad
            if (0 === strpos($pathinfo, '/distribucion/paisestadociudad') && preg_match('#^/distribucion/paisestadociudad/(?P<id>[^/]++)/(?P<mostrar>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pais_estado_ciudad')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::paisestadociudadAction',));
            }

            // xx
            if ($pathinfo === '/distribucion/xx') {
                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController::templateAction',  'template' => 'DistribucionBundle:Default/includes:maps.html.twig',  '_route' => 'xx',);
            }

            // infooperadores
            if ($pathinfo === '/distribucion/operador/info') {
                return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::infoAction',  '_route' => 'infooperadores',);
            }

            if (0 === strpos($pathinfo, '/distribucion/reporte')) {
                // reporte_informativo
                if ($pathinfo === '/distribucion/reporte/informativo') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ReporteController::reporteinformativoAction',  '_route' => 'reporte_informativo',);
                }

                // generar_reporte
                if (0 === strpos($pathinfo, '/distribucion/reporte/generar') && preg_match('#^/distribucion/reporte/generar/(?P<tipo>[^/]++)/(?P<formato>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'generar_reporte')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ReporteController::generarreporteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/distribucion/operador')) {
                // operador
                if ($pathinfo === '/distribucion/operador/lista') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::indexAction',  '_route' => 'operador',);
                }

                // operador_list
                if (preg_match('#^/distribucion/operador/(?P<idpais>[^/]++)/(?P<idtipooperador>[^/]++)/lista$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'operador_list')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::listaAction',));
                }

            }

            // operador_show
            if (preg_match('#^/distribucion/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'operador_show')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::showAction',));
            }

            // operador_new
            if ($pathinfo === '/distribucion/operador/new') {
                return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::newAction',  '_route' => 'operador_new',);
            }

            // operador_create
            if ($pathinfo === '/distribucion/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_operador_create;
                }

                return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::createAction',  '_route' => 'operador_create',);
            }
            not_operador_create:

            // operador_edit
            if (preg_match('#^/distribucion/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'operador_edit')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::editAction',));
            }

            // operador_update
            if (preg_match('#^/distribucion/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_operador_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'operador_update')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::updateAction',));
            }
            not_operador_update:

            // operador_delete
            if (preg_match('#^/distribucion/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_operador_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'operador_delete')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::deleteAction',));
            }
            not_operador_delete:

            if (0 === strpos($pathinfo, '/distribucion/representante')) {
                // representante
                if ($pathinfo === '/distribucion/representante/lista') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\RepresentanteController::indexAction',  '_route' => 'representante',);
                }

                // representante_show
                if (preg_match('#^/distribucion/representante/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'representante_show')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\RepresentanteController::showAction',));
                }

                // representante_new_add
                if (preg_match('#^/distribucion/representante/(?P<id>[^/]++)/newAdd$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'representante_new_add')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\RepresentanteController::newAddAction',));
                }

                // representante_create
                if ($pathinfo === '/distribucion/representante/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_representante_create;
                    }

                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\RepresentanteController::createAction',  '_route' => 'representante_create',);
                }
                not_representante_create:

                // representante_create_add
                if (preg_match('#^/distribucion/representante/(?P<id>[^/]++)/createAdd$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_representante_create_add;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'representante_create_add')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\RepresentanteController::createAddAction',));
                }
                not_representante_create_add:

                // representante_edit
                if (preg_match('#^/distribucion/representante/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'representante_edit')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\RepresentanteController::editAction',));
                }

                // representante_update
                if (preg_match('#^/distribucion/representante/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_representante_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'representante_update')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\RepresentanteController::updateAction',));
                }
                not_representante_update:

                // representante_delete
                if (preg_match('#^/distribucion/representante/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_representante_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'representante_delete')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\RepresentanteController::deleteAction',));
                }
                not_representante_delete:

            }

            if (0 === strpos($pathinfo, '/distribucion/tipooperador')) {
                // tipooperador
                if ($pathinfo === '/distribucion/tipooperador/lista') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\TipooperadorController::indexAction',  '_route' => 'tipooperador',);
                }

                // tipooperador_show
                if (preg_match('#^/distribucion/tipooperador/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tipooperador_show')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\TipooperadorController::showAction',));
                }

                // tipooperador_new
                if ($pathinfo === '/distribucion/tipooperador/new') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\TipooperadorController::newAction',  '_route' => 'tipooperador_new',);
                }

                // tipooperador_create
                if ($pathinfo === '/distribucion/tipooperador/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_tipooperador_create;
                    }

                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\TipooperadorController::createAction',  '_route' => 'tipooperador_create',);
                }
                not_tipooperador_create:

                // tipooperador_edit
                if (preg_match('#^/distribucion/tipooperador/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tipooperador_edit')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\TipooperadorController::editAction',));
                }

                // tipooperador_update
                if (preg_match('#^/distribucion/tipooperador/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_tipooperador_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tipooperador_update')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\TipooperadorController::updateAction',));
                }
                not_tipooperador_update:

                // tipooperador_delete
                if (preg_match('#^/distribucion/tipooperador/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_tipooperador_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tipooperador_delete')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\TipooperadorController::deleteAction',));
                }
                not_tipooperador_delete:

            }

            if (0 === strpos($pathinfo, '/distribucion/objetocomodato')) {
                // objetocomodato
                if ($pathinfo === '/distribucion/objetocomodato/lista') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ObjetocomodatoController::indexAction',  '_route' => 'objetocomodato',);
                }

                // objetocomodato_show
                if (preg_match('#^/distribucion/objetocomodato/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'objetocomodato_show')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ObjetocomodatoController::showAction',));
                }

                // objetocomodato_new
                if ($pathinfo === '/distribucion/objetocomodato/new') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ObjetocomodatoController::newAction',  '_route' => 'objetocomodato_new',);
                }

                // objetocomodato_create
                if ($pathinfo === '/distribucion/objetocomodato/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_objetocomodato_create;
                    }

                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ObjetocomodatoController::createAction',  '_route' => 'objetocomodato_create',);
                }
                not_objetocomodato_create:

                // objetocomodato_edit
                if (preg_match('#^/distribucion/objetocomodato/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'objetocomodato_edit')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ObjetocomodatoController::editAction',));
                }

                // objetocomodato_update
                if (preg_match('#^/distribucion/objetocomodato/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_objetocomodato_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'objetocomodato_update')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ObjetocomodatoController::updateAction',));
                }
                not_objetocomodato_update:

                // objetocomodato_delete
                if (preg_match('#^/distribucion/objetocomodato/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_objetocomodato_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'objetocomodato_delete')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ObjetocomodatoController::deleteAction',));
                }
                not_objetocomodato_delete:

            }

            if (0 === strpos($pathinfo, '/distribucion/paquete')) {
                // paquete
                if ($pathinfo === '/distribucion/paquete') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\PaqueteController::indexAction',  '_route' => 'paquete',);
                }

                // paquete_show
                if (preg_match('#^/distribucion/paquete/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'paquete_show')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\PaqueteController::showAction',));
                }

                // paquete_new
                if ($pathinfo === '/distribucion/paquete/new') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\PaqueteController::newAction',  '_route' => 'paquete_new',);
                }

                // paquete_create
                if ($pathinfo === '/distribucion/paquete/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_paquete_create;
                    }

                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\PaqueteController::createAction',  '_route' => 'paquete_create',);
                }
                not_paquete_create:

                // paquete_edit
                if (preg_match('#^/distribucion/paquete/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'paquete_edit')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\PaqueteController::editAction',));
                }

                // paquete_update
                if (preg_match('#^/distribucion/paquete/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_paquete_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'paquete_update')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\PaqueteController::updateAction',));
                }
                not_paquete_update:

                // paquete_delete
                if (preg_match('#^/distribucion/paquete/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_paquete_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'paquete_delete')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\PaqueteController::deleteAction',));
                }
                not_paquete_delete:

            }

            if (0 === strpos($pathinfo, '/distribucion/zona')) {
                // zona
                if ($pathinfo === '/distribucion/zona') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ZonaController::indexAction',  '_route' => 'zona',);
                }

                // zona_show
                if (preg_match('#^/distribucion/zona/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_show')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ZonaController::showAction',));
                }

                // zona_new
                if ($pathinfo === '/distribucion/zona/new') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ZonaController::newAction',  '_route' => 'zona_new',);
                }

                // zona_create
                if ($pathinfo === '/distribucion/zona/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_zona_create;
                    }

                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ZonaController::createAction',  '_route' => 'zona_create',);
                }
                not_zona_create:

                // zona_edit
                if (preg_match('#^/distribucion/zona/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_edit')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ZonaController::editAction',));
                }

                // zona_update
                if (preg_match('#^/distribucion/zona/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_zona_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_update')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ZonaController::updateAction',));
                }
                not_zona_update:

                // zona_delete
                if (preg_match('#^/distribucion/zona/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_zona_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_delete')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ZonaController::deleteAction',));
                }
                not_zona_delete:

            }

        }

        // videoteca_homepage
        if ($pathinfo === '/videoteca/inicio') {
            return array (  '_controller' => 'Frontend\\VideotecaBundle\\Controller\\DefaultController::indexAction',  '_route' => 'videoteca_homepage',);
        }

        if (0 === strpos($pathinfo, '/usuario')) {
            // usuario_homepage
            if ($pathinfo === '/usuario/inicio') {
                return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\DefaultController::indexAction',  '_route' => 'usuario_homepage',);
            }

            if (0 === strpos($pathinfo, '/usuario/log')) {
                if (0 === strpos($pathinfo, '/usuario/login')) {
                    // usuario_login
                    if ($pathinfo === '/usuario/login') {
                        return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\DefaultController::loginAction',  '_route' => 'usuario_login',);
                    }

                    // usuario_login_check
                    if ($pathinfo === '/usuario/login_check') {
                        return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\DefaultController::loginCheckAction',  '_route' => 'usuario_login_check',);
                    }

                }

                // usuario_logout
                if ($pathinfo === '/usuario/logout') {
                    return array('_route' => 'usuario_logout');
                }

            }

            // contacto
            if ($pathinfo === '/usuario/contacto') {
                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController::templateAction',  'template' => 'UsuarioBundle:Default:contacto.html.twig',  '_route' => 'contacto',);
            }

            // sincronizacion
            if ($pathinfo === '/usuario/sincronizacion') {
                return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\DefaultController::sincronizacionAction',  '_route' => 'sincronizacion',);
            }

            // user
            if ($pathinfo === '/usuario/lista') {
                return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\UserController::indexAction',  '_route' => 'user',);
            }

            // user_show
            if (preg_match('#^/usuario/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\UserController::showAction',));
            }

            // user_new
            if ($pathinfo === '/usuario/new') {
                return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
            }

            // user_create
            if ($pathinfo === '/usuario/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_create;
                }

                return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\UserController::createAction',  '_route' => 'user_create',);
            }
            not_user_create:

            // user_edit
            if (preg_match('#^/usuario/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\UserController::editAction',));
            }

            // user_update
            if (preg_match('#^/usuario/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_update')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\UserController::updateAction',));
            }
            not_user_update:

            // user_delete
            if (preg_match('#^/usuario/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\UserController::deleteAction',));
            }
            not_user_delete:

            if (0 === strpos($pathinfo, '/usuario/rol')) {
                // rol
                if ($pathinfo === '/usuario/rol/lista') {
                    return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\RolController::indexAction',  '_route' => 'rol',);
                }

                // rol_show
                if (preg_match('#^/usuario/rol/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'rol_show')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\RolController::showAction',));
                }

                // rol_new
                if ($pathinfo === '/usuario/rol/new') {
                    return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\RolController::newAction',  '_route' => 'rol_new',);
                }

                // rol_create
                if ($pathinfo === '/usuario/rol/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_rol_create;
                    }

                    return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\RolController::createAction',  '_route' => 'rol_create',);
                }
                not_rol_create:

                // rol_edit
                if (preg_match('#^/usuario/rol/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'rol_edit')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\RolController::editAction',));
                }

                // rol_update
                if (preg_match('#^/usuario/rol/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_rol_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'rol_update')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\RolController::updateAction',));
                }
                not_rol_update:

                // rol_delete
                if (preg_match('#^/usuario/rol/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_rol_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'rol_delete')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\RolController::deleteAction',));
                }
                not_rol_delete:

            }

            if (0 === strpos($pathinfo, '/usuario/perfil')) {
                // perfil
                if ($pathinfo === '/usuario/perfil/perfil/lista') {
                    return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\PerfilController::indexAction',  '_route' => 'perfil',);
                }

                // perfil_show
                if (preg_match('#^/usuario/perfil/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'perfil_show')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\PerfilController::showAction',));
                }

                // perfil_new
                if ($pathinfo === '/usuario/perfil/new') {
                    return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\PerfilController::newAction',  '_route' => 'perfil_new',);
                }

                // perfil_create
                if ($pathinfo === '/usuario/perfil/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_perfil_create;
                    }

                    return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\PerfilController::createAction',  '_route' => 'perfil_create',);
                }
                not_perfil_create:

                // perfil_edit
                if (preg_match('#^/usuario/perfil/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'perfil_edit')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\PerfilController::editAction',));
                }

                // perfil_update
                if (preg_match('#^/usuario/perfil/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_perfil_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'perfil_update')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\PerfilController::updateAction',));
                }
                not_perfil_update:

                // perfil_delete
                if (preg_match('#^/usuario/perfil/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_perfil_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'perfil_delete')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\PerfilController::deleteAction',));
                }
                not_perfil_delete:

            }

        }

        // login
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'login');
            }

            return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\DefaultController::indexAction',  '_route' => 'login',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
