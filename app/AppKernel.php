<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Administracion\UsuarioBundle\UsuarioBundle(),
            new Frontend\VideotecaBundle\VideotecaBundle(),
            new Frontend\DistribucionBundle\DistribucionBundle(),
            new Frontend\VisitasBundle\FrontendVisitasBundle(),
            new Frontend\LicenciasBundle\LicenciasBundle(),
            new Frontend\NominaBundle\NominaBundle(),
            new Frontend\NetoBundle\NetoBundle(),
            new Frontend\ConstanciaBundle\ConstanciaBundle(),
            new Frontend\SitBundle\SitBundle(),
            new Frontend\ContenidosBundle\ContenidosBundle(),
            new Frontend\TransporteBundle\TransporteBundle(),
            new Frontend\MercalBundle\MercalBundle(),
            new Frontend\DirectorioBundle\DirectorioBundle(),
            new Frontend\ContratosBundle\ContratosBundle(),
            new Frontend\IncidenciaBundle\IncidenciaBundle(),
            new Frontend\CumpleaniosBundle\CumpleaniosBundle(),
            new Frontend\CreatvBundle\CreatvBundle(),
            new Frontend\ProyectoBundle\ProyectoBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            //$bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
