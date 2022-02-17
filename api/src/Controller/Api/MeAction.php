<?php

namespace App\Controller\Api;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Security\Core\Security;

#[AsController]
class MeAction extends AbstractController
{
    public function __construct(private Security $security)
    {
    }

    public function __invoke(): User
    {
        return $this->security->getUser();
    }
}