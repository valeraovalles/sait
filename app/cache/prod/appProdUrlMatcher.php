<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/proyecto')) {
            // proyecto_homepage
            if ($pathinfo === '/proyecto/index') {
                return array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\DefaultController::indexAction',  '_route' => 'proyecto_homepage',);
            }

            if (0 === strpos($pathinfo, '/proyecto/proyecto')) {
                // proyecto
                if ($pathinfo === '/proyecto/proyecto/lista') {
                    return array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ProyectoController::indexAction',  '_route' => 'proyecto',);
                }

                // proyecto_general
                if ($pathinfo === '/proyecto/proyecto/general/lista') {
                    return array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ProyectoController::generalAction',  '_route' => 'proyecto_general',);
                }

                // proyecto_show
                if (preg_match('#^/proyecto/proyecto/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'proyecto_show')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ProyectoController::showAction',));
                }

                // proyecto_show_general
                if (0 === strpos($pathinfo, '/proyecto/proyecto/general') && preg_match('#^/proyecto/proyecto/general/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'proyecto_show_general')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ProyectoController::showgeneralAction',));
                }

                if (0 === strpos($pathinfo, '/proyecto/proyecto/new')) {
                    // proyecto_new
                    if ($pathinfo === '/proyecto/proyecto/new') {
                        return array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ProyectoController::newAction',  '_route' => 'proyecto_new',);
                    }

                    // proyecto_newgeneral
                    if ($pathinfo === '/proyecto/proyecto/new/general') {
                        return array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ProyectoController::newgeneralAction',  '_route' => 'proyecto_newgeneral',);
                    }

                }

                if (0 === strpos($pathinfo, '/proyecto/proyecto/create')) {
                    // proyecto_create
                    if ($pathinfo === '/proyecto/proyecto/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_proyecto_create;
                        }

                        return array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ProyectoController::createAction',  '_route' => 'proyecto_create',);
                    }
                    not_proyecto_create:

                    // proyecto_creategeneral
                    if ($pathinfo === '/proyecto/proyecto/create/general') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_proyecto_creategeneral;
                        }

                        return array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ProyectoController::creategeneralAction',  '_route' => 'proyecto_creategeneral',);
                    }
                    not_proyecto_creategeneral:

                }

                // proyecto_edit
                if (preg_match('#^/proyecto/proyecto/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'proyecto_edit')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ProyectoController::editAction',));
                }

                // proyecto_update
                if (preg_match('#^/proyecto/proyecto/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_proyecto_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'proyecto_update')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ProyectoController::updateAction',));
                }
                not_proyecto_update:

                // proyecto_delete
                if (preg_match('#^/proyecto/proyecto/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_proyecto_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'proyecto_delete')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ProyectoController::deleteAction',));
                }
                not_proyecto_delete:

            }

            if (0 === strpos($pathinfo, '/proyecto/tarea')) {
                // tarea
                if (0 === strpos($pathinfo, '/proyecto/tarea/lista') && preg_match('#^/proyecto/tarea/lista/(?P<idproyecto>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarea')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\TareaController::indexAction',));
                }

                // tarea_general
                if (0 === strpos($pathinfo, '/proyecto/tarea/general/lista') && preg_match('#^/proyecto/tarea/general/lista/(?P<idproyecto>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarea_general')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\TareaController::generalAction',));
                }

                // tarea_show
                if (preg_match('#^/proyecto/tarea/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarea_show')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\TareaController::showAction',));
                }

                // tarea_show_general
                if (0 === strpos($pathinfo, '/proyecto/tarea/general') && preg_match('#^/proyecto/tarea/general/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarea_show_general')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\TareaController::showgeneralAction',));
                }

                // tarea_new
                if (0 === strpos($pathinfo, '/proyecto/tarea/new') && preg_match('#^/proyecto/tarea/new/(?P<idproyecto>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarea_new')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\TareaController::newAction',));
                }

                // tarea_create
                if (0 === strpos($pathinfo, '/proyecto/tarea/create') && preg_match('#^/proyecto/tarea/create/(?P<idproyecto>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_tarea_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarea_create')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\TareaController::createAction',));
                }
                not_tarea_create:

                // tarea_edit
                if (preg_match('#^/proyecto/tarea/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarea_edit')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\TareaController::editAction',));
                }

                // tarea_update
                if (preg_match('#^/proyecto/tarea/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_tarea_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarea_update')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\TareaController::updateAction',));
                }
                not_tarea_update:

                // tarea_delete
                if (preg_match('#^/proyecto/tarea/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_tarea_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarea_delete')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\TareaController::deleteAction',));
                }
                not_tarea_delete:

            }

            if (0 === strpos($pathinfo, '/proyecto/actividad')) {
                // actividad
                if (0 === strpos($pathinfo, '/proyecto/actividad/lista') && preg_match('#^/proyecto/actividad/lista/(?P<idtarea>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'actividad')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ActividadController::indexAction',));
                }

                // actividad_general
                if (0 === strpos($pathinfo, '/proyecto/actividad/general/lista') && preg_match('#^/proyecto/actividad/general/lista/(?P<idtarea>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'actividad_general')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ActividadController::generalAction',));
                }

                // actividad_show
                if (preg_match('#^/proyecto/actividad/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'actividad_show')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ActividadController::showAction',));
                }

                // actividad_show_general
                if (0 === strpos($pathinfo, '/proyecto/actividad/general') && preg_match('#^/proyecto/actividad/general/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'actividad_show_general')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ActividadController::showgeneralAction',));
                }

                // actividad_new
                if (0 === strpos($pathinfo, '/proyecto/actividad/new') && preg_match('#^/proyecto/actividad/new/(?P<idtarea>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'actividad_new')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ActividadController::newAction',));
                }

                // actividad_create
                if (0 === strpos($pathinfo, '/proyecto/actividad/create') && preg_match('#^/proyecto/actividad/create/(?P<idtarea>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_actividad_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'actividad_create')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ActividadController::createAction',));
                }
                not_actividad_create:

                // actividad_edit
                if (0 === strpos($pathinfo, '/proyecto/actividad/edit') && preg_match('#^/proyecto/actividad/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'actividad_edit')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ActividadController::editAction',));
                }

                // actividad_update
                if (preg_match('#^/proyecto/actividad/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_actividad_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'actividad_update')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ActividadController::updateAction',));
                }
                not_actividad_update:

                // actividad_delete
                if (preg_match('#^/proyecto/actividad/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_actividad_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'actividad_delete')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ActividadController::deleteAction',));
                }
                not_actividad_delete:

                // actividad_ubicacion
                if (preg_match('#^/proyecto/actividad/(?P<id>[^/]++)/ubicacion/(?P<direccion>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'actividad_ubicacion')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ActividadController::ubicacionAction',));
                }

            }

            if (0 === strpos($pathinfo, '/proyecto/comentario')) {
                if (0 === strpos($pathinfo, '/proyecto/comentarioactividad')) {
                    // comentarioactividad
                    if (0 === strpos($pathinfo, '/proyecto/comentarioactividad/lista') && preg_match('#^/proyecto/comentarioactividad/lista/(?P<idactividad>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioactividad')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioactividadController::indexAction',));
                    }

                    // comentarioactividad_show
                    if (preg_match('#^/proyecto/comentarioactividad/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioactividad_show')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioactividadController::showAction',));
                    }

                    // comentarioactividad_new
                    if (0 === strpos($pathinfo, '/proyecto/comentarioactividad/new') && preg_match('#^/proyecto/comentarioactividad/new/(?P<idactividad>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioactividad_new')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioactividadController::newAction',));
                    }

                    // comentarioactividad_create
                    if (0 === strpos($pathinfo, '/proyecto/comentarioactividad/create') && preg_match('#^/proyecto/comentarioactividad/create/(?P<idactividad>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_comentarioactividad_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioactividad_create')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioactividadController::createAction',));
                    }
                    not_comentarioactividad_create:

                    // comentarioactividad_edit
                    if (0 === strpos($pathinfo, '/proyecto/comentarioactividad/edit') && preg_match('#^/proyecto/comentarioactividad/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioactividad_edit')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioactividadController::editAction',));
                    }

                    // comentarioactividad_update
                    if (preg_match('#^/proyecto/comentarioactividad/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_comentarioactividad_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioactividad_update')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioactividadController::updateAction',));
                    }
                    not_comentarioactividad_update:

                    // comentarioactividad_delete
                    if (preg_match('#^/proyecto/comentarioactividad/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_comentarioactividad_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioactividad_delete')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioactividadController::deleteAction',));
                    }
                    not_comentarioactividad_delete:

                    if (0 === strpos($pathinfo, '/proyecto/comentarioactividad/general')) {
                        // comentarioactividad_general
                        if (0 === strpos($pathinfo, '/proyecto/comentarioactividad/general/lista') && preg_match('#^/proyecto/comentarioactividad/general/lista/(?P<idactividad>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioactividad_general')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioactividadController::generalAction',));
                        }

                        // comentarioactividad_new_general
                        if (0 === strpos($pathinfo, '/proyecto/comentarioactividad/general/new') && preg_match('#^/proyecto/comentarioactividad/general/new/(?P<idactividad>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioactividad_new_general')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioactividadController::newgeneralAction',));
                        }

                        // comentarioactividad_create_general
                        if (0 === strpos($pathinfo, '/proyecto/comentarioactividad/general/create') && preg_match('#^/proyecto/comentarioactividad/general/create/(?P<idactividad>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_comentarioactividad_create_general;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioactividad_create_general')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioactividadController::creategeneralAction',));
                        }
                        not_comentarioactividad_create_general:

                    }

                }

                // comentarioproyecto
                if (0 === strpos($pathinfo, '/proyecto/comentario/lista') && preg_match('#^/proyecto/comentario/lista/(?P<proyecto>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioproyecto')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioController::indexAction',));
                }

                // comentarioproyecto_show
                if (0 === strpos($pathinfo, '/proyecto/comentario/detalles') && preg_match('#^/proyecto/comentario/detalles/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioproyecto_show')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioController::showAction',));
                }

                // comentarioproyecto_new
                if (0 === strpos($pathinfo, '/proyecto/comentario/nuevo') && preg_match('#^/proyecto/comentario/nuevo/(?P<proyecto>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioproyecto_new')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioController::newAction',));
                }

                // comentarioproyecto_create
                if (0 === strpos($pathinfo, '/proyecto/comentario/create') && preg_match('#^/proyecto/comentario/create(?:/(?P<proyecto>[^/]++))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_comentarioproyecto_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioproyecto_create')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioController::createAction',  'proyecto' => 1,));
                }
                not_comentarioproyecto_create:

                // comentarioproyecto_edit
                if (0 === strpos($pathinfo, '/proyecto/comentario/editar') && preg_match('#^/proyecto/comentario/editar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioproyecto_edit')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioController::editAction',));
                }

                // comentarioproyecto_update
                if (preg_match('#^/proyecto/comentario/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_comentarioproyecto_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioproyecto_update')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioController::updateAction',));
                }
                not_comentarioproyecto_update:

                // comentarioproyecto_delete
                if (0 === strpos($pathinfo, '/proyecto/comentario/eliminar') && preg_match('#^/proyecto/comentario/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_comentarioproyecto_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'comentarioproyecto_delete')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\ComentarioController::deleteAction',));
                }
                not_comentarioproyecto_delete:

            }

            if (0 === strpos($pathinfo, '/proyecto/documento')) {
                // documentoproyecto
                if (0 === strpos($pathinfo, '/proyecto/documento/lista') && preg_match('#^/proyecto/documento/lista/(?P<proyecto>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentoproyecto')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\DocumentoController::indexAction',));
                }

                // documentoproyecto_show
                if (preg_match('#^/proyecto/documento/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentoproyecto_show')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\DocumentoController::showAction',));
                }

                // documentoproyecto_new
                if (0 === strpos($pathinfo, '/proyecto/documento/nuevo') && preg_match('#^/proyecto/documento/nuevo/(?P<proyecto>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentoproyecto_new')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\DocumentoController::newAction',));
                }

                // documentoproyecto_create
                if (0 === strpos($pathinfo, '/proyecto/documento/create') && preg_match('#^/proyecto/documento/create(?:/(?P<proyecto>[^/]++))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_documentoproyecto_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentoproyecto_create')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\DocumentoController::createAction',  'proyecto' => 1,));
                }
                not_documentoproyecto_create:

                // documentoproyecto_edit
                if (0 === strpos($pathinfo, '/proyecto/documento/editar') && preg_match('#^/proyecto/documento/editar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentoproyecto_edit')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\DocumentoController::editAction',));
                }

                // documentoproyecto_update
                if (preg_match('#^/proyecto/documento/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_documentoproyecto_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentoproyecto_update')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\DocumentoController::updateAction',));
                }
                not_documentoproyecto_update:

                // documentoproyecto_delete
                if (0 === strpos($pathinfo, '/proyecto/documento/eliminar') && preg_match('#^/proyecto/documento/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_documentoproyecto_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentoproyecto_delete')), array (  '_controller' => 'Frontend\\ProyectoBundle\\Controller\\DocumentoController::deleteAction',));
                }
                not_documentoproyecto_delete:

            }

        }

        if (0 === strpos($pathinfo, '/creatv')) {
            // creatv_homepage
            if ($pathinfo === '/creatv/inicio') {
                return array (  '_controller' => 'Frontend\\CreatvBundle\\Controller\\DefaultController::indexAction',  '_route' => 'creatv_homepage',);
            }

            // creatv_formtxt
            if ($pathinfo === '/creatv/formtxt') {
                return array (  '_controller' => 'Frontend\\CreatvBundle\\Controller\\DefaultController::formtxtAction',  '_route' => 'creatv_formtxt',);
            }

            // creatv_generatxt
            if ($pathinfo === '/creatv/generatxt') {
                return array (  '_controller' => 'Frontend\\CreatvBundle\\Controller\\DefaultController::generatxtAction',  '_route' => 'creatv_generatxt',);
            }

            // creatv_descargatxt
            if (0 === strpos($pathinfo, '/creatv/descargatxt') && preg_match('#^/creatv/descargatxt/(?P<fecha>[^/]++)/(?P<tipo>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'creatv_descargatxt')), array (  '_controller' => 'Frontend\\CreatvBundle\\Controller\\DefaultController::descargatxtAction',));
            }

        }

        if (0 === strpos($pathinfo, '/transporte')) {
            // transporte
            if ($pathinfo === '/transporte/index') {
                return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\DefaultController::indexAction',  '_route' => 'transporte',);
            }

            // solicitudes
            if ($pathinfo === '/transporte/solicitudes') {
                return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::indexAction',  '_route' => 'solicitudes',);
            }

            // missolicitudes
            if ($pathinfo === '/transporte/mis_solicitudes') {
                return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::missolicitudesAction',  '_route' => 'missolicitudes',);
            }

            if (0 === strpos($pathinfo, '/transporte/solicitudes')) {
                // solicitudes_por_status
                if (preg_match('#^/transporte/solicitudes/(?P<accion>[^/]++)/filtro$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'solicitudes_por_status')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::missolicitudesAction',));
                }

                // solicitudes_status
                if (preg_match('#^/transporte/solicitudes/(?P<id>[^/]++)/(?P<accion>[^/]++)/status$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'solicitudes_status')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::statusAction',));
                }

                // solicitudes_ajaxusuarios
                if (preg_match('#^/transporte/solicitudes/(?P<val>[^/]++)/ajaxusuarios$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'solicitudes_ajaxusuarios')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::ajaxListaUsuariosAction',));
                }

                // solicitudes_ajaxexternos
                if (preg_match('#^/transporte/solicitudes/(?P<val>[^/]++)/ajaxexternos$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'solicitudes_ajaxexternos')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::ajaxListaExternosAction',));
                }

                // solicitudes_show
                if (preg_match('#^/transporte/solicitudes/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'solicitudes_show')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::showAction',));
                }

            }

            // showmissolicitudes
            if (0 === strpos($pathinfo, '/transporte/mis_solicitudes') && preg_match('#^/transporte/mis_solicitudes/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'showmissolicitudes')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::showmissolicitudesAction',));
            }

            if (0 === strpos($pathinfo, '/transporte/solicitudes')) {
                // solicitudes_new
                if ($pathinfo === '/transporte/solicitudes/new') {
                    return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::newAction',  '_route' => 'solicitudes_new',);
                }

                // solicitudes_create
                if ($pathinfo === '/transporte/solicitudes/create') {
                    return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::createAction',  '_route' => 'solicitudes_create',);
                }

                // solicitudes_edit
                if (preg_match('#^/transporte/solicitudes/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'solicitudes_edit')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::editAction',));
                }

                // solicitudes_update
                if (preg_match('#^/transporte/solicitudes/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_solicitudes_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'solicitudes_update')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::updateAction',));
                }
                not_solicitudes_update:

                // solicitudes_delete
                if (preg_match('#^/transporte/solicitudes/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_solicitudes_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'solicitudes_delete')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::deleteAction',));
                }
                not_solicitudes_delete:

                // solicitudes_rechazar
                if (preg_match('#^/transporte/solicitudes/(?P<id>[^/]++)/rechazar$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'solicitudes_rechazar')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::rechazarAction',));
                }

                // solicitudes_aprobar
                if (preg_match('#^/transporte/solicitudes/(?P<id>[^/]++)/aprobar$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'solicitudes_aprobar')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::aprobarAction',));
                }

                // ajax_solicitudesmuestrapersonal
                if (0 === strpos($pathinfo, '/transporte/solicitudes/ajax') && preg_match('#^/transporte/solicitudes/ajax/(?P<valores>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajax_solicitudesmuestrapersonal')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\AjaxController::ajax_solicitudesmuestrapersonalAction',));
                }

            }

            if (0 === strpos($pathinfo, '/transporte/asignaciones')) {
                // asignaciones
                if ($pathinfo === '/transporte/asignaciones/index') {
                    return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\AsignacionesController::indexAction',  '_route' => 'asignaciones',);
                }

                // asignacionesshow
                if (preg_match('#^/transporte/asignaciones/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'asignacionesshow')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\AsignacionesController::showAction',));
                }

                // asignacionesshowSolicitud
                if (preg_match('#^/transporte/asignaciones/(?P<idSolicitud>[^/]++)/showSolicitud$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'asignacionesshowSolicitud')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\AsignacionesController::showSolicitudAction',));
                }

                // asignacionesnew
                if ($pathinfo === '/transporte/asignaciones/new') {
                    return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\AsignacionesController::newAction',  '_route' => 'asignacionesnew',);
                }

                // asignacionescreate
                if ($pathinfo === '/transporte/asignaciones/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_asignacionescreate;
                    }

                    return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\AsignacionesController::createAction',  '_route' => 'asignacionescreate',);
                }
                not_asignacionescreate:

                // asignacionesedit
                if (preg_match('#^/transporte/asignaciones/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'asignacionesedit')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\AsignacionesController::editAction',));
                }

                // asignacionesupdate
                if (preg_match('#^/transporte/asignaciones/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_asignacionesupdate;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'asignacionesupdate')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\AsignacionesController::updateAction',));
                }
                not_asignacionesupdate:

                // asignacionesdelete
                if (preg_match('#^/transporte/asignaciones/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_asignacionesdelete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'asignacionesdelete')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\AsignacionesController::deleteAction',));
                }
                not_asignacionesdelete:

            }

            if (0 === strpos($pathinfo, '/transporte/personalexterno')) {
                // personalexterno_list
                if ($pathinfo === '/transporte/personalexterno') {
                    return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\personalExternoController::indexAction',  '_route' => 'personalexterno_list',);
                }

                // personalexterno_show
                if (preg_match('#^/transporte/personalexterno/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'personalexterno_show')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\personalExternoController::showAction',));
                }

                // personalexterno_new
                if ($pathinfo === '/transporte/personalexterno/new') {
                    return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\personalExternoController::newAction',  '_route' => 'personalexterno_new',);
                }

                // personalexterno_create
                if ($pathinfo === '/transporte/personalexterno/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_personalexterno_create;
                    }

                    return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\personalExternoController::createAction',  '_route' => 'personalexterno_create',);
                }
                not_personalexterno_create:

                // personalexterno_edit
                if (preg_match('#^/transporte/personalexterno/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'personalexterno_edit')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\personalExternoController::editAction',));
                }

                // personalexterno_update
                if (preg_match('#^/transporte/personalexterno/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_personalexterno_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'personalexterno_update')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\personalExternoController::updateAction',));
                }
                not_personalexterno_update:

                // personalexterno_delete
                if (preg_match('#^/transporte/personalexterno/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_personalexterno_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'personalexterno_delete')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\personalExternoController::deleteAction',));
                }
                not_personalexterno_delete:

            }

            if (0 === strpos($pathinfo, '/transporte/vehiculos')) {
                // vehiculos_list
                if ($pathinfo === '/transporte/vehiculos') {
                    return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\VehiculosController::indexAction',  '_route' => 'vehiculos_list',);
                }

                // transporte_show
                if (preg_match('#^/transporte/vehiculos/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'transporte_show')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\VehiculosController::showAction',));
                }

                // transporte_new
                if ($pathinfo === '/transporte/vehiculos/new') {
                    return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\VehiculosController::newAction',  '_route' => 'transporte_new',);
                }

                // transporte_create
                if ($pathinfo === '/transporte/vehiculos/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_transporte_create;
                    }

                    return array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\VehiculosController::createAction',  '_route' => 'transporte_create',);
                }
                not_transporte_create:

                // transporte_edit
                if (preg_match('#^/transporte/vehiculos/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'transporte_edit')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\VehiculosController::editAction',));
                }

                // transporte_update
                if (preg_match('#^/transporte/vehiculos/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_transporte_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'transporte_update')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\VehiculosController::updateAction',));
                }
                not_transporte_update:

                // transporte_delete
                if (preg_match('#^/transporte/vehiculos/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_transporte_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'transporte_delete')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\VehiculosController::deleteAction',));
                }
                not_transporte_delete:

            }

            // ajaxapruebarechaza
            if (0 === strpos($pathinfo, '/transporte/solicitudes/aa/ajax') && preg_match('#^/transporte/solicitudes/aa/ajax/(?P<datos>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajaxapruebarechaza')), array (  '_controller' => 'Frontend\\TransporteBundle\\Controller\\SolicitudesController::ajaxapruebarechazaAction',));
            }

        }

        if (0 === strpos($pathinfo, '/cumpleanios')) {
            // cumpleanios_homepage
            if (0 === strpos($pathinfo, '/cumpleanios/hello') && preg_match('#^/cumpleanios/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cumpleanios_homepage')), array (  '_controller' => 'Frontend\\CumpleaniosBundle\\Controller\\DefaultController::indexAction',));
            }

            // cumpleanios_personal
            if ($pathinfo === '/cumpleanios/personal/lista') {
                return array (  '_controller' => 'Frontend\\CumpleaniosBundle\\Controller\\PersonalController::indexAction',  '_route' => 'cumpleanios_personal',);
            }

            // cumpleanios_personal_show
            if (preg_match('#^/cumpleanios/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cumpleanios_personal_show')), array (  '_controller' => 'Frontend\\CumpleaniosBundle\\Controller\\PersonalController::showAction',));
            }

            // cumpleanios_personal_new
            if ($pathinfo === '/cumpleanios/new') {
                return array (  '_controller' => 'Frontend\\CumpleaniosBundle\\Controller\\PersonalController::newAction',  '_route' => 'cumpleanios_personal_new',);
            }

            // cumpleanios_personal_create
            if ($pathinfo === '/cumpleanios/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_cumpleanios_personal_create;
                }

                return array (  '_controller' => 'Frontend\\CumpleaniosBundle\\Controller\\PersonalController::createAction',  '_route' => 'cumpleanios_personal_create',);
            }
            not_cumpleanios_personal_create:

            // cumpleanios_personal_edit
            if (preg_match('#^/cumpleanios/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cumpleanios_personal_edit')), array (  '_controller' => 'Frontend\\CumpleaniosBundle\\Controller\\PersonalController::editAction',));
            }

            // cumpleanios_personal_update
            if (preg_match('#^/cumpleanios/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_cumpleanios_personal_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cumpleanios_personal_update')), array (  '_controller' => 'Frontend\\CumpleaniosBundle\\Controller\\PersonalController::updateAction',));
            }
            not_cumpleanios_personal_update:

            // cumpleanios_personal_delete
            if (preg_match('#^/cumpleanios/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_cumpleanios_personal_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cumpleanios_personal_delete')), array (  '_controller' => 'Frontend\\CumpleaniosBundle\\Controller\\PersonalController::deleteAction',));
            }
            not_cumpleanios_personal_delete:

        }

        // incidencia_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'incidencia_homepage')), array (  '_controller' => 'Frontend\\IncidenciaBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/jornada')) {
            // mercal_numeracion
            if (0 === strpos($pathinfo, '/jornada/numeracion') && preg_match('#^/jornada/numeracion/(?P<idjornada1>[^/]++)/(?P<idjornada2>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_numeracion')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::numeracionAction',));
            }

            if (0 === strpos($pathinfo, '/jornada/homepage')) {
                // mercal_homepagenum
                if (0 === strpos($pathinfo, '/jornada/homepagenum') && preg_match('#^/jornada/homepagenum/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_homepagenum')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::homepagenumAction',));
                }

                // mercal_homepagejor
                if ($pathinfo === '/jornada/homepagejor') {
                    return array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::homepagejorAction',  '_route' => 'mercal_homepagejor',);
                }

            }

            // ajaxmercal_siguienteautomatico
            if (0 === strpos($pathinfo, '/jornada/ajaxmercalsiguienteautomatico') && preg_match('#^/jornada/ajaxmercalsiguienteautomatico/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajaxmercal_siguienteautomatico')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\AjaxController::ajaxmercalsiguienteautomaticoAction',));
            }

            // mercal_compronocomprotrabajador
            if (0 === strpos($pathinfo, '/jornada/compronocomprotrabajador') && preg_match('#^/jornada/compronocomprotrabajador/(?P<idjornada>[^/]++)/(?P<idtrabajador>[^/]++)/(?P<compro>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_compronocomprotrabajador')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::compronocomprotrabajadorAction',));
            }

            // mercal_homepage
            if (0 === strpos($pathinfo, '/jornada/num/numeracion') && preg_match('#^/jornada/num/numeracion/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_homepage')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::indexAction',));
            }

            // mercal_cerrarjornada
            if (0 === strpos($pathinfo, '/jornada/cerrarjornada') && preg_match('#^/jornada/cerrarjornada/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_cerrarjornada')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\AjaxController::cerrarjornadaAction',));
            }

            // mercal_jornadanumeracion
            if ($pathinfo === '/jornada/num/jornadanumeracion') {
                return array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::jornadanumeracionAction',  '_route' => 'mercal_jornadanumeracion',);
            }

            if (0 === strpos($pathinfo, '/jornada/a')) {
                if (0 === strpos($pathinfo, '/jornada/ajaxmercalsiguiente')) {
                    // ajaxmercal_siguiente
                    if (preg_match('#^/jornada/ajaxmercalsiguiente/(?P<idjornada>[^/]++)/(?P<usernumeroid>[^/]++)/(?P<compro>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajaxmercal_siguiente')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\AjaxController::ajaxmercalsiguienteAction',));
                    }

                    // ajaxmercal_siguientecomprobar
                    if (0 === strpos($pathinfo, '/jornada/ajaxmercalsiguientecomprobar') && preg_match('#^/jornada/ajaxmercalsiguientecomprobar/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajaxmercal_siguientecomprobar')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\AjaxController::ajaxmercalsiguientecomprobarAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/jornada/asignum')) {
                    // mercal_seleccionajornada
                    if ($pathinfo === '/jornada/asignum/seleccionajornada') {
                        return array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::seleccionajornadaAction',  '_route' => 'mercal_seleccionajornada',);
                    }

                    if (0 === strpos($pathinfo, '/jornada/asignum/listado')) {
                        // mercal_listado
                        if (preg_match('#^/jornada/asignum/listado/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_listado')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::listadoAction',));
                        }

                        // mercal_listadofam
                        if (0 === strpos($pathinfo, '/jornada/asignum/listadofam') && preg_match('#^/jornada/asignum/listadofam/(?P<idtrabajador>[^/]++)/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_listadofam')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::listadofamAction',));
                        }

                    }

                    // mercal_asignarnumero
                    if (0 === strpos($pathinfo, '/jornada/asignum/asignarnumero') && preg_match('#^/jornada/asignum/asignarnumero/(?P<idtrabajador>[^/]++)/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_asignarnumero')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::asignarnumeroAction',));
                    }

                    if (0 === strpos($pathinfo, '/jornada/asignum/eliminarnumero')) {
                        // mercal_eliminarnumerotrab
                        if (0 === strpos($pathinfo, '/jornada/asignum/eliminarnumerotrab') && preg_match('#^/jornada/asignum/eliminarnumerotrab/(?P<idtrabajador>[^/]++)/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_eliminarnumerotrab')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::eliminarnumerotrabAction',));
                        }

                        // mercal_eliminarnumerofam
                        if (0 === strpos($pathinfo, '/jornada/asignum/eliminarnumerofam') && preg_match('#^/jornada/asignum/eliminarnumerofam/(?P<idtrabajador>[^/]++)/(?P<idfamiliar>[^/]++)/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_eliminarnumerofam')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::eliminarnumerofamAction',));
                        }

                    }

                    // mercal_guardaasignarnumero
                    if (0 === strpos($pathinfo, '/jornada/asignum/guardaasignarnumero') && preg_match('#^/jornada/asignum/guardaasignarnumero/(?P<idtrabajador>[^/]++)/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_guardaasignarnumero')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::guardaasignarnumeroAction',));
                    }

                    // mercal_nuevofam
                    if (0 === strpos($pathinfo, '/jornada/asignum/nuevofam') && preg_match('#^/jornada/asignum/nuevofam/(?P<idtrabajador>[^/]++)/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_nuevofam')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::nuevofamAction',));
                    }

                    if (0 === strpos($pathinfo, '/jornada/asignum/guarda')) {
                        // mercal_guardanuevofam
                        if (0 === strpos($pathinfo, '/jornada/asignum/guardanuevofam') && preg_match('#^/jornada/asignum/guardanuevofam/(?P<idtrabajador>[^/]++)/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_guardanuevofam')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::guardanuevofamAction',));
                        }

                        // mercal_guardaasignarnumerofam
                        if (0 === strpos($pathinfo, '/jornada/asignum/guardaasignarnumerofam') && preg_match('#^/jornada/asignum/guardaasignarnumerofam/(?P<idtrabajador>[^/]++)/(?P<idfamiliar>[^/]++)/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_guardaasignarnumerofam')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::guardaasignarnumerofamAction',));
                        }

                    }

                    // mercal_editarfam
                    if (0 === strpos($pathinfo, '/jornada/asignum/editarfam') && preg_match('#^/jornada/asignum/editarfam/(?P<idfamiliar>[^/]++)/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_editarfam')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::editarfamAction',));
                    }

                    // mercal_actualizaeditarfam
                    if (0 === strpos($pathinfo, '/jornada/asignum/actualizaeditarfam') && preg_match('#^/jornada/asignum/actualizaeditarfam/(?P<idfamiliar>[^/]++)/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_actualizaeditarfam')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::actualizaeditarfamAction',));
                    }

                    // mercal_borrarfam
                    if (0 === strpos($pathinfo, '/jornada/asignum/borrarfam') && preg_match('#^/jornada/asignum/borrarfam/(?P<idtrabajador>[^/]++)/(?P<idfamiliar>[^/]++)/(?P<idjornada>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'mercal_borrarfam')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\DefaultController::borrarfamAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/jornada/jornada')) {
                // jornada
                if ($pathinfo === '/jornada/jornada/lista') {
                    return array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\JornadaController::indexAction',  '_route' => 'jornada',);
                }

                // jornada_show
                if (preg_match('#^/jornada/jornada/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'jornada_show')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\JornadaController::showAction',));
                }

                // jornada_new
                if ($pathinfo === '/jornada/jornada/new') {
                    return array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\JornadaController::newAction',  '_route' => 'jornada_new',);
                }

                // jornada_create
                if ($pathinfo === '/jornada/jornada/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_jornada_create;
                    }

                    return array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\JornadaController::createAction',  '_route' => 'jornada_create',);
                }
                not_jornada_create:

                // jornada_edit
                if (preg_match('#^/jornada/jornada/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'jornada_edit')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\JornadaController::editAction',));
                }

                // jornada_update
                if (preg_match('#^/jornada/jornada/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_jornada_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'jornada_update')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\JornadaController::updateAction',));
                }
                not_jornada_update:

                // jornada_delete
                if (preg_match('#^/jornada/jornada/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_jornada_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'jornada_delete')), array (  '_controller' => 'Frontend\\MercalBundle\\Controller\\JornadaController::deleteAction',));
                }
                not_jornada_delete:

            }

        }

        if (0 === strpos($pathinfo, '/directorio')) {
            if (0 === strpos($pathinfo, '/directorio/in')) {
                // directorio_homepage
                if ($pathinfo === '/directorio/inicio') {
                    return array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\DefaultController::inicioAction',  '_route' => 'directorio_homepage',);
                }

                if (0 === strpos($pathinfo, '/directorio/inst')) {
                    // institucion
                    if ($pathinfo === '/directorio/inst') {
                        return array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\InstitucionController::indexAction',  '_route' => 'institucion',);
                    }

                    // institucion_show
                    if (preg_match('#^/directorio/inst/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'institucion_show')), array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\InstitucionController::showAction',));
                    }

                }

            }

            // institucion_new
            if ($pathinfo === '/directorio/newinst') {
                return array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\InstitucionController::newAction',  '_route' => 'institucion_new',);
            }

            // institucion_create
            if ($pathinfo === '/directorio/createinst') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_institucion_create;
                }

                return array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\InstitucionController::createAction',  '_route' => 'institucion_create',);
            }
            not_institucion_create:

            if (0 === strpos($pathinfo, '/directorio/inst')) {
                // institucion_edit
                if (preg_match('#^/directorio/inst/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'institucion_edit')), array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\InstitucionController::editAction',));
                }

                // institucion_update
                if (preg_match('#^/directorio/inst/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_institucion_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'institucion_update')), array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\InstitucionController::updateAction',));
                }
                not_institucion_update:

                // institucion_delete
                if (preg_match('#^/directorio/inst/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_institucion_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'institucion_delete')), array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\InstitucionController::deleteAction',));
                }
                not_institucion_delete:

            }

            if (0 === strpos($pathinfo, '/directorio/pers')) {
                // personalidad
                if ($pathinfo === '/directorio/pers') {
                    return array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\PersonalidadController::indexAction',  '_route' => 'personalidad',);
                }

                // personalidad_show
                if (preg_match('#^/directorio/pers/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'personalidad_show')), array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\PersonalidadController::showAction',));
                }

            }

            // personalidad_new
            if ($pathinfo === '/directorio/newpers') {
                return array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\PersonalidadController::newAction',  '_route' => 'personalidad_new',);
            }

            // personalidad_create
            if ($pathinfo === '/directorio/createpers') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_personalidad_create;
                }

                return array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\PersonalidadController::createAction',  '_route' => 'personalidad_create',);
            }
            not_personalidad_create:

            if (0 === strpos($pathinfo, '/directorio/pers')) {
                // personalidad_edit
                if (preg_match('#^/directorio/pers/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'personalidad_edit')), array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\PersonalidadController::editAction',));
                }

                // personalidad_update
                if (preg_match('#^/directorio/pers/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_personalidad_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'personalidad_update')), array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\PersonalidadController::updateAction',));
                }
                not_personalidad_update:

                // personalidad_delete
                if (preg_match('#^/directorio/pers/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_personalidad_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'personalidad_delete')), array (  '_controller' => 'Frontend\\DirectorioBundle\\Controller\\PersonalidadController::deleteAction',));
                }
                not_personalidad_delete:

            }

        }

        if (0 === strpos($pathinfo, '/cont')) {
            if (0 === strpos($pathinfo, '/contratos')) {
                // contratos
                if ($pathinfo === '/contratos/inicio') {
                    return array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::indexAction',  '_route' => 'contratos',);
                }

                // contratos_show
                if (0 === strpos($pathinfo, '/contratos/detalle') && preg_match('#^/contratos/detalle/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratos_show')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::showAction',));
                }

                // contratos_new
                if ($pathinfo === '/contratos/nuevo') {
                    return array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::newAction',  '_route' => 'contratos_new',);
                }

                // contratos_create
                if ($pathinfo === '/contratos/crear') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_contratos_create;
                    }

                    return array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::createAction',  '_route' => 'contratos_create',);
                }
                not_contratos_create:

                // contratos_edit
                if (0 === strpos($pathinfo, '/contratos/editar') && preg_match('#^/contratos/editar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratos_edit')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::editAction',));
                }

                // contratos_update
                if (0 === strpos($pathinfo, '/contratos/actualizar') && preg_match('#^/contratos/actualizar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_contratos_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratos_update')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::updateAction',));
                }
                not_contratos_update:

                // contratos_delete
                if (0 === strpos($pathinfo, '/contratos/eliminar') && preg_match('#^/contratos/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratos_delete')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::deleteAction',));
                }

                // contratos_pasados
                if ($pathinfo === '/contratos/inicio/años_anteriores') {
                    return array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::indexpasadosAction',  '_route' => 'contratos_pasados',);
                }

                // contratos_pasados_show
                if (0 === strpos($pathinfo, '/contratos/detalle/años_anteriores') && preg_match('#^/contratos/detalle/años_anteriores/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratos_pasados_show')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::showpasadosAction',));
                }

                // contratos_pasados_edit
                if (0 === strpos($pathinfo, '/contratos/editar/años_anteriores') && preg_match('#^/contratos/editar/años_anteriores/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratos_pasados_edit')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::editpasadosAction',));
                }

                // contratos_pasados_update
                if (0 === strpos($pathinfo, '/contratos/actualizar/años_anteriores') && preg_match('#^/contratos/actualizar/años_anteriores/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_contratos_pasados_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratos_pasados_update')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::updatepasadosAction',));
                }
                not_contratos_pasados_update:

                // contratos_pasados_new
                if ($pathinfo === '/contratos/nuevo/años_anteriores') {
                    return array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::newpasadosAction',  '_route' => 'contratos_pasados_new',);
                }

                // contratos_pasados_create
                if ($pathinfo === '/contratos/crear/años_anteriores') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_contratos_pasados_create;
                    }

                    return array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::createpasadosAction',  '_route' => 'contratos_pasados_create',);
                }
                not_contratos_pasados_create:

                // contratos_pasados_delete
                if (0 === strpos($pathinfo, '/contratos/eliminar/años_anteriores') && preg_match('#^/contratos/eliminar/años_anteriores/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratos_pasados_delete')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\ContratosController::deletepasadosAction',));
                }

                if (0 === strpos($pathinfo, '/contratos/abogados')) {
                    // abogados
                    if ($pathinfo === '/contratos/abogados/inicio') {
                        return array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\AbogadosController::indexAction',  '_route' => 'abogados',);
                    }

                    // abogados_show
                    if (0 === strpos($pathinfo, '/contratos/abogados/detalles') && preg_match('#^/contratos/abogados/detalles/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'abogados_show')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\AbogadosController::showAction',));
                    }

                    // abogados_new
                    if ($pathinfo === '/contratos/abogados/nuevo') {
                        return array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\AbogadosController::newAction',  '_route' => 'abogados_new',);
                    }

                    // abogados_create
                    if ($pathinfo === '/contratos/abogados/crear') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_abogados_create;
                        }

                        return array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\AbogadosController::createAction',  '_route' => 'abogados_create',);
                    }
                    not_abogados_create:

                    // abogados_edit
                    if (0 === strpos($pathinfo, '/contratos/abogados/editar') && preg_match('#^/contratos/abogados/editar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'abogados_edit')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\AbogadosController::editAction',));
                    }

                    // abogados_update
                    if (0 === strpos($pathinfo, '/contratos/abogados/actualizar') && preg_match('#^/contratos/abogados/actualizar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_abogados_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'abogados_update')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\AbogadosController::updateAction',));
                    }
                    not_abogados_update:

                    // abogados_delete
                    if (0 === strpos($pathinfo, '/contratos/abogados/eliminar') && preg_match('#^/contratos/abogados/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'abogados_delete')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\AbogadosController::deleteAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/contratos/direccion/solicitante')) {
                    // Direccionsolicitante
                    if (rtrim($pathinfo, '/') === '/contratos/direccion/solicitante') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'Direccionsolicitante');
                        }

                        return array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\DireccionsolicitanteController::indexAction',  '_route' => 'Direccionsolicitante',);
                    }

                    // Direccionsolicitante_show
                    if (0 === strpos($pathinfo, '/contratos/direccion/solicitante/detalles') && preg_match('#^/contratos/direccion/solicitante/detalles/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Direccionsolicitante_show')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\DireccionsolicitanteController::showAction',));
                    }

                    // Direccionsolicitante_new
                    if ($pathinfo === '/contratos/direccion/solicitante/nuevo') {
                        return array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\DireccionsolicitanteController::newAction',  '_route' => 'Direccionsolicitante_new',);
                    }

                    // Direccionsolicitante_create
                    if ($pathinfo === '/contratos/direccion/solicitante/crear') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_Direccionsolicitante_create;
                        }

                        return array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\DireccionsolicitanteController::createAction',  '_route' => 'Direccionsolicitante_create',);
                    }
                    not_Direccionsolicitante_create:

                    // Direccionsolicitante_edit
                    if (0 === strpos($pathinfo, '/contratos/direccion/solicitante/editar') && preg_match('#^/contratos/direccion/solicitante/editar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Direccionsolicitante_edit')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\DireccionsolicitanteController::editAction',));
                    }

                    // Direccionsolicitante_update
                    if (0 === strpos($pathinfo, '/contratos/direccion/solicitante/actualizar') && preg_match('#^/contratos/direccion/solicitante/actualizar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_Direccionsolicitante_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Direccionsolicitante_update')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\DireccionsolicitanteController::updateAction',));
                    }
                    not_Direccionsolicitante_update:

                    // Direccionsolicitante_delete
                    if (0 === strpos($pathinfo, '/contratos/direccion/solicitante/eliminar') && preg_match('#^/contratos/direccion/solicitante/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Direccionsolicitante_delete')), array (  '_controller' => 'Frontend\\ContratosBundle\\Controller\\DireccionsolicitanteController::deleteAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/contenidos')) {
                // datosproveedor
                if ($pathinfo === '/contenidos/proveedor/show/home') {
                    return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\DatosproveedorController::indexAction',  '_route' => 'datosproveedor',);
                }

                // datoscompras
                if ($pathinfo === '/contenidos/compras/home') {
                    return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\DatosproveedorController::comprasAction',  '_route' => 'datoscompras',);
                }

                // datosinformacion
                if ($pathinfo === '/contenidos/informacion/home') {
                    return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\DatosproveedorController::informacionAction',  '_route' => 'datosinformacion',);
                }

                // datosequipos
                if ($pathinfo === '/contenidos/equipostelesur/home') {
                    return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\DatosproveedorController::equiposAction',  '_route' => 'datosequipos',);
                }

                // datosinactivos
                if ($pathinfo === '/contenidos/inactivos/home') {
                    return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\DatosproveedorController::inactivosAction',  '_route' => 'datosinactivos',);
                }

                if (0 === strpos($pathinfo, '/contenidos/proveedor')) {
                    // datosproveedor_show
                    if (0 === strpos($pathinfo, '/contenidos/proveedor/show/detalles') && preg_match('#^/contenidos/proveedor/show/detalles/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'datosproveedor_show')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\DatosproveedorController::showAction',));
                    }

                    if (0 === strpos($pathinfo, '/contenidos/proveedor/creaelimina')) {
                        // datosproveedor_new
                        if ($pathinfo === '/contenidos/proveedor/creaelimina/nuevo') {
                            return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\DatosproveedorController::newAction',  '_route' => 'datosproveedor_new',);
                        }

                        // datosproveedor_create
                        if ($pathinfo === '/contenidos/proveedor/creaelimina/crear') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_datosproveedor_create;
                            }

                            return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\DatosproveedorController::createAction',  '_route' => 'datosproveedor_create',);
                        }
                        not_datosproveedor_create:

                    }

                    if (0 === strpos($pathinfo, '/contenidos/proveedor/edit')) {
                        // datosproveedor_edit
                        if (0 === strpos($pathinfo, '/contenidos/proveedor/edit/editar') && preg_match('#^/contenidos/proveedor/edit/editar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'datosproveedor_edit')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\DatosproveedorController::editAction',));
                        }

                        // datosproveedor_update
                        if (0 === strpos($pathinfo, '/contenidos/proveedor/edit/actualizar') && preg_match('#^/contenidos/proveedor/edit/actualizar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_datosproveedor_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'datosproveedor_update')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\DatosproveedorController::updateAction',));
                        }
                        not_datosproveedor_update:

                    }

                    // datosproveedor_delete
                    if (0 === strpos($pathinfo, '/contenidos/proveedor/creaelimina/eliminar') && preg_match('#^/contenidos/proveedor/creaelimina/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'datosproveedor_delete')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\DatosproveedorController::deleteAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/contenidos/banco')) {
                    if (0 === strpos($pathinfo, '/contenidos/banco/show')) {
                        // banco
                        if (0 === strpos($pathinfo, '/contenidos/banco/show/home') && preg_match('#^/contenidos/banco/show/home/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'banco')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\BancoController::indexAction',));
                        }

                        // banco_show
                        if (0 === strpos($pathinfo, '/contenidos/banco/show/detalles') && preg_match('#^/contenidos/banco/show/detalles/(?P<id_proveedor>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'banco_show')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\BancoController::showAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/contenidos/banco/edit')) {
                        // banco_new
                        if (0 === strpos($pathinfo, '/contenidos/banco/edit/nuevo') && preg_match('#^/contenidos/banco/edit/nuevo/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'banco_new')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\BancoController::newAction',));
                        }

                        // banco_create
                        if (0 === strpos($pathinfo, '/contenidos/banco/edit/crear') && preg_match('#^/contenidos/banco/edit/crear/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_banco_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'banco_create')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\BancoController::createAction',));
                        }
                        not_banco_create:

                        // banco_edit
                        if (0 === strpos($pathinfo, '/contenidos/banco/edit/editar') && preg_match('#^/contenidos/banco/edit/editar/(?P<id>[^/]++)/prueba/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'banco_edit')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\BancoController::editAction',));
                        }

                        // banco_update
                        if (0 === strpos($pathinfo, '/contenidos/banco/edit/actualizar') && preg_match('#^/contenidos/banco/edit/actualizar/(?P<id>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_banco_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'banco_update')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\BancoController::updateAction',));
                        }
                        not_banco_update:

                        // banco_delete
                        if (0 === strpos($pathinfo, '/contenidos/banco/edit/eliminar') && preg_match('#^/contenidos/banco/edit/eliminar/(?P<id>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'banco_delete')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\BancoController::deleteAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/contenidos/contratacion')) {
                    if (0 === strpos($pathinfo, '/contenidos/contratacion/show')) {
                        // contratacion
                        if (0 === strpos($pathinfo, '/contenidos/contratacion/show/home') && preg_match('#^/contenidos/contratacion/show/home/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratacion')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ContratacionController::indexAction',));
                        }

                        // contratacion_show
                        if (0 === strpos($pathinfo, '/contenidos/contratacion/show/detalles') && preg_match('#^/contenidos/contratacion/show/detalles/(?P<id>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratacion_show')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ContratacionController::showAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/contenidos/contratacion/edit')) {
                        // contratacion_new
                        if (0 === strpos($pathinfo, '/contenidos/contratacion/edit/nuevo') && preg_match('#^/contenidos/contratacion/edit/nuevo/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratacion_new')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ContratacionController::newAction',));
                        }

                        // contratacion_create
                        if (0 === strpos($pathinfo, '/contenidos/contratacion/edit/crear') && preg_match('#^/contenidos/contratacion/edit/crear/(?P<id_proveedor>[^/]++)/(?P<id_presupuesto>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_contratacion_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratacion_create')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ContratacionController::createAction',));
                        }
                        not_contratacion_create:

                        // contratacion_edit
                        if (0 === strpos($pathinfo, '/contenidos/contratacion/edit/editar') && preg_match('#^/contenidos/contratacion/edit/editar/(?P<id>[^/]++)/(?P<id_proveedor>[^/]++)/(?P<id_presupuesto>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratacion_edit')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ContratacionController::editAction',));
                        }

                        // contratacion_update
                        if (0 === strpos($pathinfo, '/contenidos/contratacion/edit/actualizar') && preg_match('#^/contenidos/contratacion/edit/actualizar/(?P<id>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_contratacion_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratacion_update')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ContratacionController::updateAction',));
                        }
                        not_contratacion_update:

                        // contratacion_delete
                        if (0 === strpos($pathinfo, '/contenidos/contratacion/edit/eliminar') && preg_match('#^/contenidos/contratacion/edit/eliminar/(?P<id>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'contratacion_delete')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ContratacionController::deleteAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/contenidos/pago')) {
                    if (0 === strpos($pathinfo, '/contenidos/pago/show')) {
                        // pago
                        if (0 === strpos($pathinfo, '/contenidos/pago/show/home') && preg_match('#^/contenidos/pago/show/home/(?P<id_contratacion>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'pago')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PagoController::indexAction',));
                        }

                        // pago_show
                        if (0 === strpos($pathinfo, '/contenidos/pago/show/detalles') && preg_match('#^/contenidos/pago/show/detalles/(?P<id>[^/]++)/(?P<id_contratacion>[^/]++)/(?P<id_proveedor>[^/]++)/(?P<id_presupuesto>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'pago_show')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PagoController::showAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/contenidos/pago/edit')) {
                        // pago_new
                        if (0 === strpos($pathinfo, '/contenidos/pago/edit/nuevo') && preg_match('#^/contenidos/pago/edit/nuevo/(?P<id_contratacion>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'pago_new')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PagoController::newAction',));
                        }

                        // pago_create
                        if (0 === strpos($pathinfo, '/contenidos/pago/edit/crear') && preg_match('#^/contenidos/pago/edit/crear/(?P<id_contratacion>[^/]++)/(?P<tipomoneda>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_pago_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'pago_create')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PagoController::createAction',));
                        }
                        not_pago_create:

                        // pago_edit
                        if (0 === strpos($pathinfo, '/contenidos/pago/edit/editar') && preg_match('#^/contenidos/pago/edit/editar/(?P<id>[^/]++)/(?P<id_contratacion>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'pago_edit')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PagoController::editAction',));
                        }

                        // pago_update
                        if (0 === strpos($pathinfo, '/contenidos/pago/edit/actualizar') && preg_match('#^/contenidos/pago/edit/actualizar/(?P<id>[^/]++)/(?P<id_contratacion>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_pago_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'pago_update')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PagoController::updateAction',));
                        }
                        not_pago_update:

                        // pago_delete
                        if (0 === strpos($pathinfo, '/contenidos/pago/edit/eliminar') && preg_match('#^/contenidos/pago/edit/eliminar/(?P<id>[^/]++)/(?P<id_contratacion>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'pago_delete')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PagoController::deleteAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/contenidos/pago/control')) {
                        // pago_control
                        if (preg_match('#^/contenidos/pago/control/(?P<id>[^/]++)/(?P<id_contratacion>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'pago_control')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PagoController::controlAction',));
                        }

                        // pago_controlupdate
                        if (0 === strpos($pathinfo, '/contenidos/pago/control/actualizar') && preg_match('#^/contenidos/pago/control/actualizar/(?P<id>[^/]++)/(?P<id_contratacion>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_pago_controlupdate;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'pago_controlupdate')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PagoController::controlupdateAction',));
                        }
                        not_pago_controlupdate:

                    }

                    // pago_control_ruta
                    if (0 === strpos($pathinfo, '/contenidos/pago/ruta') && preg_match('#^/contenidos/pago/ruta/(?P<id>[^/]++)/(?P<id_contratacion>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'pago_control_ruta')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PagoController::controlrutaAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/contenidos/controlpagounidad')) {
                    // controlpagounidad
                    if ($pathinfo === '/contenidos/controlpagounidad/home') {
                        return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ControlpagounidadController::indexAction',  '_route' => 'controlpagounidad',);
                    }

                    // controlpagounidad_show
                    if (0 === strpos($pathinfo, '/contenidos/controlpagounidad/detalles') && preg_match('#^/contenidos/controlpagounidad/detalles/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'controlpagounidad_show')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ControlpagounidadController::showAction',));
                    }

                    // controlpagounidad_new
                    if ($pathinfo === '/contenidos/controlpagounidad/nuevo') {
                        return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ControlpagounidadController::newAction',  '_route' => 'controlpagounidad_new',);
                    }

                    // controlpagounidad_create
                    if ($pathinfo === '/contenidos/controlpagounidad/crear') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_controlpagounidad_create;
                        }

                        return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ControlpagounidadController::createAction',  '_route' => 'controlpagounidad_create',);
                    }
                    not_controlpagounidad_create:

                    // controlpagounidad_edit
                    if (0 === strpos($pathinfo, '/contenidos/controlpagounidad/editar') && preg_match('#^/contenidos/controlpagounidad/editar/(?P<id>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'controlpagounidad_edit')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ControlpagounidadController::editAction',));
                    }

                    // controlpagounidad_update
                    if (0 === strpos($pathinfo, '/contenidos/controlpagounidad/actualizar') && preg_match('#^/contenidos/controlpagounidad/actualizar/(?P<id>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_controlpagounidad_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'controlpagounidad_update')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ControlpagounidadController::updateAction',));
                    }
                    not_controlpagounidad_update:

                    // controlpagounidad_delete
                    if (0 === strpos($pathinfo, '/contenidos/controlpagounidad/eliminar') && preg_match('#^/contenidos/controlpagounidad/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_controlpagounidad_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'controlpagounidad_delete')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\ControlpagounidadController::deleteAction',));
                    }
                    not_controlpagounidad_delete:

                }

                if (0 === strpos($pathinfo, '/contenidos/presupuesto')) {
                    if (0 === strpos($pathinfo, '/contenidos/presupuesto/show')) {
                        // presupuesto
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/show/home') && preg_match('#^/contenidos/presupuesto/show/home/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::indexAction',));
                        }

                        // presupuesto_show
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/show/detalles') && preg_match('#^/contenidos/presupuesto/show/detalles/(?P<id>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_show')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::showAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/contenidos/presupuesto/edit')) {
                        // presupuesto_new
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/edit/nuevo') && preg_match('#^/contenidos/presupuesto/edit/nuevo/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_new')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::newAction',));
                        }

                        // presupuesto_create
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/edit/crear') && preg_match('#^/contenidos/presupuesto/edit/crear/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_presupuesto_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_create')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::createAction',));
                        }
                        not_presupuesto_create:

                        // presupuesto_edit
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/edit/editar') && preg_match('#^/contenidos/presupuesto/edit/editar/(?P<id>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_edit')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::editAction',));
                        }

                        // presupuesto_update
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/edit/actualizar') && preg_match('#^/contenidos/presupuesto/edit/actualizar/(?P<id>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_presupuesto_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_update')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::updateAction',));
                        }
                        not_presupuesto_update:

                        // presupuesto_delete
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/edit/eliminar') && preg_match('#^/contenidos/presupuesto/edit/eliminar/(?P<id>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_delete')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::deleteAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/contenidos/presupuesto/show/extension')) {
                        // presupuesto_extensionindex
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/show/extension/home') && preg_match('#^/contenidos/presupuesto/show/extension/home/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_extensionindex')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::extensionindexAction',));
                        }

                        // presupuesto_extensionshow
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/show/extension/detalle') && preg_match('#^/contenidos/presupuesto/show/extension/detalle/(?P<id>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_extensionshow')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::extensionshowAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/contenidos/presupuesto/edit/extension')) {
                        // presupuesto_extensionedit
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/edit/extension/editar') && preg_match('#^/contenidos/presupuesto/edit/extension/editar/(?P<id>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_extensionedit')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::extensioneditAction',));
                        }

                        // presupuesto_extensionupdate
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/edit/extension/actualizar') && preg_match('#^/contenidos/presupuesto/edit/extension/actualizar/(?P<id>[^/]++)/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_presupuesto_extensionupdate;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_extensionupdate')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::extensionupdateAction',));
                        }
                        not_presupuesto_extensionupdate:

                        // presupuesto_extensionnew
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/edit/extension/nuevo') && preg_match('#^/contenidos/presupuesto/edit/extension/nuevo/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_extensionnew')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::extensionnewAction',));
                        }

                        // presupuesto_extensioncreate
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/edit/extension/crear') && preg_match('#^/contenidos/presupuesto/edit/extension/crear/(?P<id_presupuesto>[^/]++)/(?P<id_proveedor>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_extensioncreate')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::extensioncreateAction',));
                        }

                        // presupuesto_extensiondelete
                        if (0 === strpos($pathinfo, '/contenidos/presupuesto/edit/extension/eliminar') && preg_match('#^/contenidos/presupuesto/edit/extension/eliminar/(?P<id>[^/]++)/(?P<id_proveedor>[^/]++)/(?P<id_presupuesto>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'presupuesto_extensiondelete')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::extensiondeleteAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/contenidos/ajax/contenidos')) {
                    // ajax_datosproveedor
                    if (preg_match('#^/contenidos/ajax/contenidos/(?P<datos>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajax_datosproveedor')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\AjaxController::datosproveedorAction',));
                    }

                    // ajax_datossat
                    if (0 === strpos($pathinfo, '/contenidos/ajax/contenidos/satelites') && preg_match('#^/contenidos/ajax/contenidos/satelites/(?P<sats>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajax_datossat')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\AjaxController::datossatAction',));
                    }

                    // ajax_disponibilidad
                    if (0 === strpos($pathinfo, '/contenidos/ajax/contenidos/disponilidad') && preg_match('#^/contenidos/ajax/contenidos/disponilidad/(?P<datos>[^/]++)/(?P<mostrar>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajax_disponibilidad')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\AjaxController::disAction',));
                    }

                    if (0 === strpos($pathinfo, '/contenidos/ajax/contenidos/pagos')) {
                        // ajax_pago
                        if (0 === strpos($pathinfo, '/contenidos/ajax/contenidos/pagos/dias') && preg_match('#^/contenidos/ajax/contenidos/pagos/dias/(?P<dias>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajax_pago')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\AjaxController::pagoAction',));
                        }

                        // ajax_fechas
                        if (0 === strpos($pathinfo, '/contenidos/ajax/contenidos/pagos/fechas') && preg_match('#^/contenidos/ajax/contenidos/pagos/fechas/(?P<fechas>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajax_fechas')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\AjaxController::fechasAction',));
                        }

                    }

                }

                // rutapago_formulario
                if ($pathinfo === '/contenidos/rutapago_formulario') {
                    return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PagoController::rutahomeAction',  '_route' => 'rutapago_formulario',);
                }

                if (0 === strpos($pathinfo, '/contenidos/di')) {
                    // disponibilidad_show
                    if ($pathinfo === '/contenidos/disponibilidad/show') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_disponibilidad_show;
                        }

                        return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\PresupuestoController::disponibilidadshowAction',  '_route' => 'disponibilidad_show',);
                    }
                    not_disponibilidad_show:

                    if (0 === strpos($pathinfo, '/contenidos/diasdeentrega')) {
                        // indexdias
                        if ($pathinfo === '/contenidos/diasdeentrega/home') {
                            return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::indexdiasAction',  '_route' => 'indexdias',);
                        }

                        // editdias
                        if (0 === strpos($pathinfo, '/contenidos/diasdeentrega/detalles') && preg_match('#^/contenidos/diasdeentrega/detalles/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'editdias')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::editdiasAction',));
                        }

                        // updatedias
                        if (0 === strpos($pathinfo, '/contenidos/diasdeentrega/actualizar') && preg_match('#^/contenidos/diasdeentrega/actualizar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'updatedias')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::updatediasAction',));
                        }

                        // newdias
                        if ($pathinfo === '/contenidos/diasdeentrega/nuevo') {
                            return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::newdiasAction',  '_route' => 'newdias',);
                        }

                        // createdias
                        if ($pathinfo === '/contenidos/diasdeentrega/create') {
                            return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::creatediasAction',  '_route' => 'createdias',);
                        }

                        // deletedias
                        if (0 === strpos($pathinfo, '/contenidos/diasdeentrega/eliminar') && preg_match('#^/contenidos/diasdeentrega/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deletedias')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::deletediasAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/contenidos/analista')) {
                    // indexanalista
                    if ($pathinfo === '/contenidos/analista/home') {
                        return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::indexanalistaAction',  '_route' => 'indexanalista',);
                    }

                    // editanalista
                    if (0 === strpos($pathinfo, '/contenidos/analista/detalles') && preg_match('#^/contenidos/analista/detalles/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'editanalista')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::editanalistaAction',));
                    }

                    // updateanalista
                    if (0 === strpos($pathinfo, '/contenidos/analista/actualizar') && preg_match('#^/contenidos/analista/actualizar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'updateanalista')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::updateanalistaAction',));
                    }

                    // newanalista
                    if ($pathinfo === '/contenidos/analista/nuevo') {
                        return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::newanalistaAction',  '_route' => 'newanalista',);
                    }

                    // createanalista
                    if ($pathinfo === '/contenidos/analista/create') {
                        return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::createanalistaAction',  '_route' => 'createanalista',);
                    }

                    // deleteanalista
                    if (0 === strpos($pathinfo, '/contenidos/analista/eliminar') && preg_match('#^/contenidos/analista/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'deleteanalista')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::deleteanalistaAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/contenidos/solicitante')) {
                    // indexsolicitante
                    if ($pathinfo === '/contenidos/solicitante/home') {
                        return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::indexsolicitanteAction',  '_route' => 'indexsolicitante',);
                    }

                    // showsolicitante
                    if (0 === strpos($pathinfo, '/contenidos/solicitante/detalles') && preg_match('#^/contenidos/solicitante/detalles/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'showsolicitante')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::showsolicitanteAction',));
                    }

                    // editsolicitante
                    if (0 === strpos($pathinfo, '/contenidos/solicitante/editar') && preg_match('#^/contenidos/solicitante/editar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'editsolicitante')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::editsolicitanteAction',));
                    }

                    // updatesolicitante
                    if (0 === strpos($pathinfo, '/contenidos/solicitante/actualizar') && preg_match('#^/contenidos/solicitante/actualizar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'updatesolicitante')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::updatesolicitanteAction',));
                    }

                    // newsolicitante
                    if ($pathinfo === '/contenidos/solicitante/nuevo') {
                        return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::newsolicitanteAction',  '_route' => 'newsolicitante',);
                    }

                    // createsolicitante
                    if ($pathinfo === '/contenidos/solicitante/create') {
                        return array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::createsolicitanteAction',  '_route' => 'createsolicitante',);
                    }

                    // deletesolicitante
                    if (0 === strpos($pathinfo, '/contenidos/solicitante/eliminar') && preg_match('#^/contenidos/solicitante/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'deletesolicitante')), array (  '_controller' => 'Frontend\\ContenidosBundle\\Controller\\editardatosController::deletesolicitanteAction',));
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/sit')) {
            // sit_seguimientoprincipal
            if (0 === strpos($pathinfo, '/sit/seguimientoprincipal') && preg_match('#^/sit/seguimientoprincipal/(?P<idticket>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sit_seguimientoprincipal')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\SeguimientoController::seguimientoprincipalAction',));
            }

            if (0 === strpos($pathinfo, '/sit/guardaco')) {
                // sit_guardacorreo
                if (0 === strpos($pathinfo, '/sit/guardacorreo') && preg_match('#^/sit/guardacorreo/(?P<idticket>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sit_guardacorreo')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\SeguimientoController::guardacorreoAction',));
                }

                // sit_guardacomentario
                if (0 === strpos($pathinfo, '/sit/guardacomentario') && preg_match('#^/sit/guardacomentario/(?P<idticket>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sit_guardacomentario')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\SeguimientoController::guardacomentarioAction',));
                }

            }

            // ajax_listadocorreo
            if (0 === strpos($pathinfo, '/sit/ajax/listadocorreo') && preg_match('#^/sit/ajax/listadocorreo/(?P<letra>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajax_listadocorreo')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\AjaxController::listadocorreoAction',));
            }

            // sit_homepage
            if ($pathinfo === '/sit/inicio') {
                return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\DefaultController::indexAction',  '_route' => 'sit_homepage',);
            }

            // ticket_asignado
            if ($pathinfo === '/sit/asignado') {
                return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::asignadoAction',  '_route' => 'ticket_asignado',);
            }

            // ticket_showasignado
            if (preg_match('#^/sit/(?P<id>[^/]++)/showasignado$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_showasignado')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::showasignadoAction',));
            }

            // ticket_asignadosolucion
            if (preg_match('#^/sit/(?P<id>[^/]++)/asignadosolucion$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_asignadosolucion')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::asignadosolucionAction',));
            }

            if (0 === strpos($pathinfo, '/sit/ticket')) {
                // ticket
                if ($pathinfo === '/sit/ticket') {
                    return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::indexAction',  '_route' => 'ticket',);
                }

                // ticketgeneral
                if ($pathinfo === '/sit/ticketgeneral') {
                    return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::ticketgeneralAction',  '_route' => 'ticketgeneral',);
                }

            }

            // ticket_show
            if (preg_match('#^/sit/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_show')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::showAction',));
            }

            // ticket_asigreasig
            if (0 === strpos($pathinfo, '/sit/asigreasig') && preg_match('#^/sit/asigreasig/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_asigreasig')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::asigreasigAction',));
            }

            // ticket_listausuariounidad
            if ($pathinfo === '/sit/listausuariounidad') {
                return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::listausuariounidadAction',  '_route' => 'ticket_listausuariounidad',);
            }

            // ticket_usuariounidad
            if (0 === strpos($pathinfo, '/sit/usuariounidad') && preg_match('#^/sit/usuariounidad/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_usuariounidad')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::usuariounidadAction',));
            }

            // ticket_asignarusuariounidad
            if (0 === strpos($pathinfo, '/sit/asignarusuariounidad') && preg_match('#^/sit/asignarusuariounidad/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_asignarusuariounidad')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::asignarusuariounidadAction',));
            }

            // ticket_asignarcatsub
            if (preg_match('#^/sit/(?P<id>[^/]++)/catsub$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_asignarcatsub')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::catsubAction',));
            }

            // ticket_guardacatsub
            if (preg_match('#^/sit/(?P<id>[^/]++)/guardacatsub$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_guardacatsub')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::guardacatsubAction',));
            }

            if (0 === strpos($pathinfo, '/sit/ticket')) {
                // ticket_new
                if ($pathinfo === '/sit/ticket/new') {
                    return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::newAction',  '_route' => 'ticket_new',);
                }

                // ticket_create
                if ($pathinfo === '/sit/ticket/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ticket_create;
                    }

                    return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::createAction',  '_route' => 'ticket_create',);
                }
                not_ticket_create:

                // ticket_edit
                if (0 === strpos($pathinfo, '/sit/ticket/edit') && preg_match('#^/sit/ticket/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_edit')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::editAction',));
                }

                // ticket_update
                if (0 === strpos($pathinfo, '/sit/ticket/update') && preg_match('#^/sit/ticket/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_ticket_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_update')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::updateAction',));
                }
                not_ticket_update:

                // ticket_delete
                if (0 === strpos($pathinfo, '/sit/ticket/delete') && preg_match('#^/sit/ticket/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_ticket_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_delete')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\TicketController::deleteAction',));
                }
                not_ticket_delete:

            }

            if (0 === strpos($pathinfo, '/sit/categoria')) {
                // categoria
                if ($pathinfo === '/sit/categoria') {
                    return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\CategoriaController::indexAction',  '_route' => 'categoria',);
                }

                // categoria_show
                if (preg_match('#^/sit/categoria/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'categoria_show')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\CategoriaController::showAction',));
                }

                // categoria_new
                if ($pathinfo === '/sit/categoria/new') {
                    return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\CategoriaController::newAction',  '_route' => 'categoria_new',);
                }

                // categoria_create
                if ($pathinfo === '/sit/categoria/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_categoria_create;
                    }

                    return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\CategoriaController::createAction',  '_route' => 'categoria_create',);
                }
                not_categoria_create:

                // categoria_edit
                if (preg_match('#^/sit/categoria/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'categoria_edit')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\CategoriaController::editAction',));
                }

                // categoria_update
                if (preg_match('#^/sit/categoria/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_categoria_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'categoria_update')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\CategoriaController::updateAction',));
                }
                not_categoria_update:

                // categoria_delete
                if (preg_match('#^/sit/categoria/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_categoria_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'categoria_delete')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\CategoriaController::deleteAction',));
                }
                not_categoria_delete:

            }

            if (0 === strpos($pathinfo, '/sit/subcategoria')) {
                // subcategoria
                if (preg_match('#^/sit/subcategoria/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'subcategoria')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\SubcategoriaController::indexAction',));
                }

                // subcategoria_show
                if (preg_match('#^/sit/subcategoria/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'subcategoria_show')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\SubcategoriaController::showAction',));
                }

                // subcategoria_new
                if (0 === strpos($pathinfo, '/sit/subcategoria/new') && preg_match('#^/sit/subcategoria/new/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'subcategoria_new')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\SubcategoriaController::newAction',));
                }

                // subcategoria_create
                if (0 === strpos($pathinfo, '/sit/subcategoria/create') && preg_match('#^/sit/subcategoria/create/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_subcategoria_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'subcategoria_create')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\SubcategoriaController::createAction',));
                }
                not_subcategoria_create:

                // subcategoria_edit
                if (0 === strpos($pathinfo, '/sit/subcategoria/edit') && preg_match('#^/sit/subcategoria/edit/(?P<idsub>[^/]++)/(?P<idcat>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'subcategoria_edit')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\SubcategoriaController::editAction',));
                }

                // subcategoria_update
                if (0 === strpos($pathinfo, '/sit/subcategoria/update') && preg_match('#^/sit/subcategoria/update/(?P<idsub>[^/]++)/(?P<idcat>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_subcategoria_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'subcategoria_update')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\SubcategoriaController::updateAction',));
                }
                not_subcategoria_update:

                // subcategoria_delete
                if (preg_match('#^/sit/subcategoria/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_subcategoria_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'subcategoria_delete')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\SubcategoriaController::deleteAction',));
                }
                not_subcategoria_delete:

            }

            // reporte
            if ($pathinfo === '/sit/reporte') {
                return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\ReporteController::indexAction',  '_route' => 'reporte',);
            }

            // reporte_ajaxinformegestion
            if (0 === strpos($pathinfo, '/sit/ajaxinformegestion') && preg_match('#^/sit/ajaxinformegestion/(?P<datos>[^/]++)/(?P<mostrar>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reporte_ajaxinformegestion')), array (  '_controller' => 'Frontend\\SitBundle\\Controller\\AjaxController::ajaxinformegestionAction',));
            }

            if (0 === strpos($pathinfo, '/sit/generari')) {
                // reporte_generarinforme
                if ($pathinfo === '/sit/generarinforme') {
                    return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\ReporteController::generarinformeAction',  '_route' => 'reporte_generarinforme',);
                }

                // reporte_generarimagenes
                if ($pathinfo === '/sit/generarimagenes') {
                    return array (  '_controller' => 'Frontend\\SitBundle\\Controller\\ReporteController::generarimagenesAction',  '_route' => 'reporte_generarimagenes',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/constancia')) {
            // constancia_homepage
            if ($pathinfo === '/constancia/form') {
                return array (  '_controller' => 'Frontend\\ConstanciaBundle\\Controller\\DefaultController::indexAction',  '_route' => 'constancia_homepage',);
            }

            // constancia
            if ($pathinfo === '/constancia/inicio') {
                return array (  '_controller' => 'Frontend\\ConstanciaBundle\\Controller\\ConstanciaController::indexAction',  '_route' => 'constancia',);
            }

            // constancia_pdf
            if (0 === strpos($pathinfo, '/constancia/pdf') && preg_match('#^/constancia/pdf/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'constancia_pdf')), array (  '_controller' => 'Frontend\\ConstanciaBundle\\Controller\\ConstanciaController::pdfAction',));
            }

            // constancia_show
            if (preg_match('#^/constancia/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'constancia_show')), array (  '_controller' => 'Frontend\\ConstanciaBundle\\Controller\\ConstanciaController::showAction',));
            }

            // constancia_new
            if ($pathinfo === '/constancia/new') {
                return array (  '_controller' => 'Frontend\\ConstanciaBundle\\Controller\\ConstanciaController::newAction',  '_route' => 'constancia_new',);
            }

            // constancia_create
            if ($pathinfo === '/constancia/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_constancia_create;
                }

                return array (  '_controller' => 'Frontend\\ConstanciaBundle\\Controller\\ConstanciaController::createAction',  '_route' => 'constancia_create',);
            }
            not_constancia_create:

            // constancia_edit
            if (0 === strpos($pathinfo, '/constancia/edit') && preg_match('#^/constancia/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'constancia_edit')), array (  '_controller' => 'Frontend\\ConstanciaBundle\\Controller\\ConstanciaController::editAction',));
            }

            // constancia_update
            if (preg_match('#^/constancia/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_constancia_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'constancia_update')), array (  '_controller' => 'Frontend\\ConstanciaBundle\\Controller\\ConstanciaController::updateAction',));
            }
            not_constancia_update:

            // constancia_delete
            if (preg_match('#^/constancia/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_constancia_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'constancia_delete')), array (  '_controller' => 'Frontend\\ConstanciaBundle\\Controller\\ConstanciaController::deleteAction',));
            }
            not_constancia_delete:

        }

        if (0 === strpos($pathinfo, '/n')) {
            if (0 === strpos($pathinfo, '/neto')) {
                // neto_homepage
                if ($pathinfo === '/neto/inicio') {
                    return array (  '_controller' => 'Frontend\\NetoBundle\\Controller\\DefaultController::indexAction',  '_route' => 'neto_homepage',);
                }

                // ajax_neto
                if (0 === strpos($pathinfo, '/neto/ajaxneto') && preg_match('#^/neto/ajaxneto/(?P<datos>[^/]++)/(?P<mostrar>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajax_neto')), array (  '_controller' => 'Frontend\\NetoBundle\\Controller\\AjaxController::ajaxnetoAction',));
                }

                // generarrecibo
                if ($pathinfo === '/neto/generarrecibo') {
                    return array (  '_controller' => 'Frontend\\NetoBundle\\Controller\\DefaultController::generarreciboAction',  '_route' => 'generarrecibo',);
                }

            }

            if (0 === strpos($pathinfo, '/nomina')) {
                // nomina_homepage
                if (0 === strpos($pathinfo, '/nomina/hello') && preg_match('#^/nomina/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'nomina_homepage')), array (  '_controller' => 'Frontend\\NominaBundle\\Controller\\DefaultController::indexAction',));
                }

                // nomina_formalimentacion
                if ($pathinfo === '/nomina/formalimentacion') {
                    return array (  '_controller' => 'Frontend\\NominaBundle\\Controller\\DefaultController::formalimentacionAction',  '_route' => 'nomina_formalimentacion',);
                }

                // nomina_txtalimentacion
                if ($pathinfo === '/nomina/txtalimentacion') {
                    return array (  '_controller' => 'Frontend\\NominaBundle\\Controller\\DefaultController::txtalimentacionAction',  '_route' => 'nomina_txtalimentacion',);
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

            if (0 === strpos($pathinfo, '/licencias/reporte')) {
                if (0 === strpos($pathinfo, '/licencias/reportes')) {
                    // licencias_vencidas
                    if ($pathinfo === '/licencias/reportes/vencidas') {
                        return array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\LicenciasController::vencidasAction',  '_route' => 'licencias_vencidas',);
                    }

                    // licencias_por_vencer
                    if ($pathinfo === '/licencias/reportes/por/vencer') {
                        return array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\LicenciasController::porvencerAction',  '_route' => 'licencias_por_vencer',);
                    }

                }

                // reporte_total
                if ($pathinfo === '/licencias/reporte/total/pdf') {
                    return array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\ReportesController::totalAction',  '_route' => 'reporte_total',);
                }

                // reporte_porvencer_pdf
                if ($pathinfo === '/licencias/reporte/licencias_por_vencer/pdf') {
                    return array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\ReportesController::porvencerAction',  '_route' => 'reporte_porvencer_pdf',);
                }

                // reporte_vencidas_pdf
                if ($pathinfo === '/licencias/reportes/licencias_vencidas/pdf') {
                    return array (  '_controller' => 'Frontend\\LicenciasBundle\\Controller\\ReportesController::vencidasAction',  '_route' => 'reporte_vencidas_pdf',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/distribucion')) {
            // distribucion_homepage
            if ($pathinfo === '/distribucion/inicio') {
                return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\DefaultController::indexAction',  '_route' => 'distribucion_homepage',);
            }

            if (0 === strpos($pathinfo, '/distribucion/ajax')) {
                // ajax
                if (preg_match('#^/distribucion/ajax/(?P<datos>[^/]++)/(?P<mostrar>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajax')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\AjaxController::formularioAction',));
                }

                // ajax_grafico
                if (0 === strpos($pathinfo, '/distribucion/ajaxgrafico') && preg_match('#^/distribucion/ajaxgrafico/(?P<datos>[^/]++)/(?P<mostrar>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajax_grafico')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\AjaxController::ajaxgraficoAction',));
                }

                // ajax_top
                if (0 === strpos($pathinfo, '/distribucion/ajax_top') && preg_match('#^/distribucion/ajax_top/(?P<datos>[^/]++)/(?P<mostrar>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajax_top')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\AjaxController::topAction',));
                }

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
                if (0 === strpos($pathinfo, '/distribucion/reporte/informativo')) {
                    // reporte_informativogeneral
                    if ($pathinfo === '/distribucion/reporte/informativogeneral') {
                        return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ReporteController::informativogeneralAction',  '_route' => 'reporte_informativogeneral',);
                    }

                    // reporte_informativo
                    if ($pathinfo === '/distribucion/reporte/informativo') {
                        return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ReporteController::reporteinformativoAction',  '_route' => 'reporte_informativo',);
                    }

                }

                if (0 === strpos($pathinfo, '/distribucion/reporte/g')) {
                    // reporte_grafico
                    if ($pathinfo === '/distribucion/reporte/grafico') {
                        return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ReporteController::reportegraficoAction',  '_route' => 'reporte_grafico',);
                    }

                    if (0 === strpos($pathinfo, '/distribucion/reporte/generar')) {
                        // generar_reporte
                        if (preg_match('#^/distribucion/reporte/generar/(?P<tipo>[^/]++)/(?P<formato>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'generar_reporte')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ReporteController::generarreporteAction',));
                        }

                        // generar_reporte_grafico
                        if ($pathinfo === '/distribucion/reporte/generarreportegrafico') {
                            return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\ReporteController::generarreportegraficoAction',  '_route' => 'generar_reporte_grafico',);
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/distribucion/operador')) {
                // operador_top
                if ($pathinfo === '/distribucion/operador/top') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::topAction',  '_route' => 'operador_top',);
                }

                // operador
                if ($pathinfo === '/distribucion/operador/lista') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::indexAction',  '_route' => 'operador',);
                }

                // operador_list
                if (preg_match('#^/distribucion/operador/(?P<idpais>[^/]++)/(?P<idtipooperador>[^/]++)/lista$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'operador_list')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::listaAction',));
                }

                // operador_show
                if (preg_match('#^/distribucion/operador/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'operador_show')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::showAction',));
                }

                // operador_new
                if ($pathinfo === '/distribucion/operador/new') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::newAction',  '_route' => 'operador_new',);
                }

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

            if (0 === strpos($pathinfo, '/distribucion/operador')) {
                // operador_edit
                if (0 === strpos($pathinfo, '/distribucion/operador/edit') && preg_match('#^/distribucion/operador/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'operador_edit')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::editAction',));
                }

                // operador_update
                if (preg_match('#^/distribucion/operador/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_operador_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'operador_update')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::updateAction',));
                }
                not_operador_update:

                // operador_delete
                if (preg_match('#^/distribucion/operador/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_operador_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'operador_delete')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\OperadorController::deleteAction',));
                }
                not_operador_delete:

            }

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
                if (0 === strpos($pathinfo, '/distribucion/representante/newAdd') && preg_match('#^/distribucion/representante/newAdd/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
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
                if (0 === strpos($pathinfo, '/distribucion/representante/edit') && preg_match('#^/distribucion/representante/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
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
                if (0 === strpos($pathinfo, '/distribucion/tipooperador/edit') && preg_match('#^/distribucion/tipooperador/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
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
                if (0 === strpos($pathinfo, '/distribucion/objetocomodato/edit') && preg_match('#^/distribucion/objetocomodato/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
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
                if (0 === strpos($pathinfo, '/distribucion/zona/edit') && preg_match('#^/distribucion/zona/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
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

            if (0 === strpos($pathinfo, '/distribucion/satelite')) {
                // satelite
                if ($pathinfo === '/distribucion/satelite') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\SateliteController::indexAction',  '_route' => 'satelite',);
                }

                // satelite_show
                if (preg_match('#^/distribucion/satelite/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'satelite_show')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\SateliteController::showAction',));
                }

                // satelite_new
                if ($pathinfo === '/distribucion/satelite/new') {
                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\SateliteController::newAction',  '_route' => 'satelite_new',);
                }

                // satelite_create
                if ($pathinfo === '/distribucion/satelite/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_satelite_create;
                    }

                    return array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\SateliteController::createAction',  '_route' => 'satelite_create',);
                }
                not_satelite_create:

                // satelite_edit
                if (preg_match('#^/distribucion/satelite/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'satelite_edit')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\SateliteController::editAction',));
                }

                // satelite_update
                if (preg_match('#^/distribucion/satelite/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_satelite_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'satelite_update')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\SateliteController::updateAction',));
                }
                not_satelite_update:

                // satelite_delete
                if (preg_match('#^/distribucion/satelite/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_satelite_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'satelite_delete')), array (  '_controller' => 'Frontend\\DistribucionBundle\\Controller\\SateliteController::deleteAction',));
                }
                not_satelite_delete:

            }

        }

        if (0 === strpos($pathinfo, '/videoteca')) {
            // videoteca_homepage
            if ($pathinfo === '/videoteca/inicio') {
                return array (  '_controller' => 'Frontend\\VideotecaBundle\\Controller\\DefaultController::indexAction',  '_route' => 'videoteca_homepage',);
            }

            // videoteca_consulta
            if (0 === strpos($pathinfo, '/videoteca/consulta') && preg_match('#^/videoteca/consulta/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'videoteca_consulta')), array (  '_controller' => 'Frontend\\VideotecaBundle\\Controller\\DefaultController::consultaAction',));
            }

        }

        if (0 === strpos($pathinfo, '/usuario')) {
            if (0 === strpos($pathinfo, '/usuario/nivelorganizacional')) {
                // nivelorganizacional
                if ($pathinfo === '/usuario/nivelorganizacional/lista') {
                    return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\NivelorganizacionalController::indexAction',  '_route' => 'nivelorganizacional',);
                }

                // nivelorganizacional_show
                if (preg_match('#^/usuario/nivelorganizacional/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'nivelorganizacional_show')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\NivelorganizacionalController::showAction',));
                }

                // nivelorganizacional_new
                if ($pathinfo === '/usuario/nivelorganizacional/new') {
                    return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\NivelorganizacionalController::newAction',  '_route' => 'nivelorganizacional_new',);
                }

                // nivelorganizacional_create
                if ($pathinfo === '/usuario/nivelorganizacional/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_nivelorganizacional_create;
                    }

                    return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\NivelorganizacionalController::createAction',  '_route' => 'nivelorganizacional_create',);
                }
                not_nivelorganizacional_create:

                // nivelorganizacional_edit
                if (preg_match('#^/usuario/nivelorganizacional/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'nivelorganizacional_edit')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\NivelorganizacionalController::editAction',));
                }

                // nivelorganizacional_update
                if (preg_match('#^/usuario/nivelorganizacional/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_nivelorganizacional_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'nivelorganizacional_update')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\NivelorganizacionalController::updateAction',));
                }
                not_nivelorganizacional_update:

                // nivelorganizacional_delete
                if (preg_match('#^/usuario/nivelorganizacional/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_nivelorganizacional_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'nivelorganizacional_delete')), array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\NivelorganizacionalController::deleteAction',));
                }
                not_nivelorganizacional_delete:

            }

            // telesur_personal
            if ($pathinfo === '/usuario/telesur/personal') {
                return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\PersonalController::indexAction',  '_route' => 'telesur_personal',);
            }

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

            if (0 === strpos($pathinfo, '/usuario/c')) {
                // contacto
                if ($pathinfo === '/usuario/contacto') {
                    return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController::templateAction',  'template' => 'UsuarioBundle:Default:contacto.html.twig',  '_route' => 'contacto',);
                }

                // cambioclave
                if ($pathinfo === '/usuario/cambioclave') {
                    return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\UserController::cambioclaveAction',  '_route' => 'cambioclave',);
                }

            }

            // actualizacambioclave
            if ($pathinfo === '/usuario/actualizacambioclave') {
                return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\UserController::actualizacambioclaveAction',  '_route' => 'actualizacambioclave',);
            }

            // notificar
            if ($pathinfo === '/usuario/notificar') {
                return array (  '_controller' => 'Administracion\\UsuarioBundle\\Controller\\UserController::notificarAction',  '_route' => 'notificar',);
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

            if (0 === strpos($pathinfo, '/visitas/registra')) {
                // usuario_registrar_control
                if (0 === strpos($pathinfo, '/visitas/registrar') && preg_match('#^/visitas/registrar/(?P<cedula>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_registrar_control')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::registrarAction',));
                }

                // registranuevavisita
                if (0 === strpos($pathinfo, '/visitas/registranuevavisita') && preg_match('#^/visitas/registranuevavisita/(?P<cedula>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'registranuevavisita')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::registranuevavisitaAction',));
                }

            }

            // foto
            if ($pathinfo === '/visitas/foto') {
                return array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::fotoAction',  '_route' => 'foto',);
            }

            // mostrar
            if ($pathinfo === '/visitas/mostrar') {
                return array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::mostrarAction',  '_route' => 'mostrar',);
            }

            // usu
            if (preg_match('#^/visitas/(?P<id>[^/]++)/usu$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usu')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::usuAction',));
            }

            // usua
            if (preg_match('#^/visitas/(?P<id>[^/]++)/usua$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_usua;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usua')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::usuaAction',));
            }
            not_usua:

            // salida
            if (preg_match('#^/visitas/(?P<id>[^/]++)/salida$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'salida')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\UsuarioController::salidaAction',));
            }

            // ajaxreporte
            if (0 === strpos($pathinfo, '/visitas/ajax') && preg_match('#^/visitas/ajax/(?P<datos>[^/]++)/(?P<mostrar>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajaxreporte')), array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\AjaxController::formularioAction',));
            }

            // reporteinfo
            if ($pathinfo === '/visitas/reporteinfo') {
                return array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\ReporteController::reporteinfoAction',  '_route' => 'reporteinfo',);
            }

            // finalreporte
            if ($pathinfo === '/visitas/finalreporte') {
                return array (  '_controller' => 'Frontend\\VisitasBundle\\Controller\\ReporteController::finalreporteAction',  '_route' => 'finalreporte',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
