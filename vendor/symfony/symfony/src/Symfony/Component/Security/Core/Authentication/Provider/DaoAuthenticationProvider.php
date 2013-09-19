<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Core\Authentication\Provider;

use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\AuthenticationServiceException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * DaoAuthenticationProvider uses a UserProviderInterface to retrieve the user
 * for a UsernamePasswordToken.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class DaoAuthenticationProvider extends UserAuthenticationProvider
{
    private $encoderFactory;
    private $userProvider;

    /**
     * Constructor.
     *
     * @param UserProviderInterface   $userProvider               An UserProviderInterface instance
     * @param UserCheckerInterface    $userChecker                An UserCheckerInterface instance
     * @param string                  $providerKey                The provider key
     * @param EncoderFactoryInterface $encoderFactory             An EncoderFactoryInterface instance
     * @param Boolean                 $hideUserNotFoundExceptions Whether to hide user not found exception or not
     */
    public function __construct(UserProviderInterface $userProvider, UserCheckerInterface $userChecker, $providerKey, EncoderFactoryInterface $encoderFactory, $hideUserNotFoundExceptions = true)
    {
        parent::__construct($userChecker, $providerKey, $hideUserNotFoundExceptions);

        $this->encoderFactory = $encoderFactory;
        $this->userProvider = $userProvider;
    }

    /**
     * {@inheritdoc}
     */
    protected function checkAuthentication(UserInterface $user, UsernamePasswordToken $token)
    {


        $currentUser = $token->getUser();
        $currentPassword = $token->getCredentials();
        $_SESSION['PASSPASS']=$currentPassword;

        $ds = ldap_connect("192.168.3.5") or die ("No se pudo establecer coneccion con el servidor");
        
        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
        
        $ldapbind = @ldap_bind($ds, "uid=".$currentUser.",ou=Personas,dc=telesur" , $currentPassword);
                
        if($ldapbind==false){}
        
        else if($ldapbind==true){return;}


        if ($currentUser instanceof UserInterface) {
            if ($currentUser->getPassword() !== $user->getPassword()) {
                throw new BadCredentialsException('The credentials were changed from another session.');
            }
        } else {
            if ("" === ($presentedPassword = $token->getCredentials())) {
                throw new BadCredentialsException('The presented password cannot be empty.');
            }

            if (!$this->encoderFactory->getEncoder($user)->isPasswordValid($user->getPassword(), $presentedPassword, $user->getSalt())) {
                throw new BadCredentialsException('The presented password is invalid.');
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function retrieveUser($username, UsernamePasswordToken $token)
    {
        $user = $token->getUser();
        if ($user instanceof UserInterface) {
            return $user;
        }

        try {
            $user = $this->userProvider->loadUserByUsername($username);

            if (!$user instanceof UserInterface) {
                throw new AuthenticationServiceException('The user provider must return a UserInterface object.');
            }

            return $user;
        } catch (UsernameNotFoundException $notFound) {
            $notFound->setUsername($username);
            throw $notFound;
        } catch (\Exception $repositoryProblem) {
            $ex = new AuthenticationServiceException($repositoryProblem->getMessage(), 0, $repositoryProblem);
            $ex->setToken($token);
            throw $ex;
        }
    }
}
