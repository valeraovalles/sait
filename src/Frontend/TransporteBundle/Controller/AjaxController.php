<?php

namespace Frontend\TransporteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\TransporteBundle\Entity\Asignaciones;
use Frontend\TransporteBundle\Form\AsignacionesType;

/**
 * Ajax controller.
 *
 */
class AjaxController extends Controller
{
	public function ajax_solicitudesmuestrapersonalAction($valores)
	{
		echo "holaa";
		die;
	}
}