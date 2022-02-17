<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class JWTRefreshDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        
        $pathItem = new Model\PathItem(
            ref: 'JWT Refresh Token',
            post: new Model\Operation(
                operationId: 'postRefreshToken',
                tags: ['Token'],
                responses: [
                    '204' => [
                        'description' => 'Refresh JWT token',
                    ],
                ],
                summary: 'Get JWT refreshed token',
                requestBody: new Model\RequestBody(
                    description: 'Generate new JWT Token',
                ),
            ),
        );
        $openApi->getPaths()->addPath('/refresh_token', $pathItem);

        return $openApi;
    }
}