<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace SprykerTest\Glue\SecurityExtension\Dependency\Plugin;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\SecurityOwnershipContextTransfer;
use Generated\Shared\Transfer\SecurityOwnershipFactsRequestTransfer;
use ReflectionClass;
use Spryker\Glue\SecurityExtension\Dependency\Plugin\SecurityOwnershipFactsProviderPluginInterface;
use Symfony\Component\DependencyInjection\Compiler\RegisterAutoconfigureAttributesPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Glue
 * @group SecurityExtension
 * @group Dependency
 * @group Plugin
 * @group SecurityOwnershipFactsProviderPluginInterfaceTest
 * Add your own group annotations below this line
 * @group SecurityAuthorization
 */
class SecurityOwnershipFactsProviderPluginInterfaceTest extends Unit
{
    protected const string SERVICE_ID = 'test.security_ownership_facts_provider';

    public function testGivenAnAutoconfiguredImplementationWhenTheContainerIsCompiledThenItIsTaggedWithTheInterface(): void
    {
        // Arrange
        $containerBuilder = $this->createContainerBuilderWithAutoconfigurationOfTheInterface();
        $containerBuilder->register(static::SERVICE_ID, get_class($this->createSecurityOwnershipFactsProviderPlugin()))
            ->setAutoconfigured(true)
            ->setPublic(true);

        // Act
        $containerBuilder->compile();

        // Assert
        $this->assertArrayHasKey(
            static::SERVICE_ID,
            $containerBuilder->findTaggedServiceIds(SecurityOwnershipFactsProviderPluginInterface::class),
        );
    }

    public function testGivenAnImplementationThatIsNotAutoconfiguredWhenTheContainerIsCompiledThenItIsNotTagged(): void
    {
        // Arrange
        $containerBuilder = $this->createContainerBuilderWithAutoconfigurationOfTheInterface();
        $containerBuilder->register(static::SERVICE_ID, get_class($this->createSecurityOwnershipFactsProviderPlugin()))
            ->setPublic(true);

        // Act
        $containerBuilder->compile();

        // Assert
        $this->assertSame([], $containerBuilder->findTaggedServiceIds(SecurityOwnershipFactsProviderPluginInterface::class));
    }

    protected function createContainerBuilderWithAutoconfigurationOfTheInterface(): ContainerBuilder
    {
        $containerBuilder = new ContainerBuilder();
        (new RegisterAutoconfigureAttributesPass())->processClass(
            $containerBuilder,
            new ReflectionClass(SecurityOwnershipFactsProviderPluginInterface::class),
        );

        return $containerBuilder;
    }

    protected function createSecurityOwnershipFactsProviderPlugin(): SecurityOwnershipFactsProviderPluginInterface
    {
        return new class implements SecurityOwnershipFactsProviderPluginInterface {
            public function isApplicable(string $objectType): bool
            {
                return false;
            }

            public function provideOwnershipFacts(
                SecurityOwnershipFactsRequestTransfer $securityOwnershipFactsRequestTransfer
            ): ?SecurityOwnershipContextTransfer {
                return null;
            }
        };
    }
}
