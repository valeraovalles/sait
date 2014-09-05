<?php

namespace Frontend\TransporteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\TransporteBundle\Entity\Asignaciones;
use Frontend\TransporteBundle\Form\AsignacionesType;

use Frontend\TransporteBundle\Resources\Misclases\agregapersonalista;
use Frontend\TransporteBundle\Resources\Misclases\muestrapersonal;

/**
 * Ajax controller.
 *
 */
class AjaxController extends Controller
{
	public function ajax_solicitudesmuestrapersonalAction($valores)
	{
		//$agrega = new; 


		echo "holaa";
		die;
	}
}