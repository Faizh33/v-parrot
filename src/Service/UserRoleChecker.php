<?php

namespace App\Service;

use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class UserRoleChecker extends AbstractExtension
{
    private $authorizationChecker;

    public function __construct(AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    public function getFilters()
    {
        return [
            new TwigFilter('user_role_checker', [$this, 'isUser']),
        ];
    }

    public function isUser()
    {
        return $this->authorizationChecker->isGranted('ROLE_USER');
    }
}