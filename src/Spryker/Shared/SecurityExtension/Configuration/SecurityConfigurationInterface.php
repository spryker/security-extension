<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\SecurityExtension\Configuration;

interface SecurityConfigurationInterface
{
    public function getFirewalls(): array;

    public function getAccessRules(): array;

    public function getRoleHierarchies(): array;

    /**
     * @return array<callable>
     */
    public function getAuthenticationSuccessHandlers(): array;

    /**
     * @return array<callable>
     */
    public function getAuthenticationFailureHandlers(): array;

    /**
     * @return array<callable>
     */
    public function getLogoutHandlers(): array;

    /**
     * @return array<callable>
     */
    public function getAccessDeniedHandlers(): array;

    public function getEventSubscribers(): array;
}
