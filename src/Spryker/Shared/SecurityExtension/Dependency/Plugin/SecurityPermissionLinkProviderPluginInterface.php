<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\SecurityExtension\Dependency\Plugin;

use Generated\Shared\Transfer\SecurityPermissionLinkCollectionTransfer;

/**
 * Implement this plugin to provide the permission links that tie a Customer Access content type to API operation patterns.
 */
interface SecurityPermissionLinkProviderPluginInterface
{
    /**
     * Specification:
     * - Executed by the security decider once per authorization decision that was granted and whose identifier is not itself a Customer Access permission, before the decision is returned.
     * - Returns every permission link, each with a content type identifier and an operation identifier pattern.
     * - A link whose pattern matches the decided operation identifier makes the decision also require a grant on its content type; without that grant the decision is denied.
     * - A link with an invalid operation identifier pattern denies every decision it would apply to, and each of those decisions logs a warning for it.
     * - Returns an empty collection when no link is known.
     *
     * @api
     */
    public function getLinks(): SecurityPermissionLinkCollectionTransfer;
}
