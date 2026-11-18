<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\SecurityExtension\Dependency\Plugin;

use Generated\Shared\Transfer\SecurityOwnershipContextTransfer;
use Generated\Shared\Transfer\SecurityOwnershipFactsRequestTransfer;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Implement this plugin to provide the ownership facts of an object type that API operations declare in `securityOwnership.objectType`.
 * An implementation placed under `Glue/{Module}/Api/{ApiType}/Security/` is registered as a service and handed to the permission voter.
 */
#[AutoconfigureTag]
interface SecurityOwnershipFactsProviderPluginInterface
{
    /**
     * Specification:
     * - Returns true when the plugin provides the ownership facts of the given object type.
     *
     * @api
     */
    public function isApplicable(string $objectType): bool;

    /**
     * Specification:
     * - Executed by the permission voter in `shadow` and `enforce` mode only, once per vote of an operation that declares the object type.
     * - Looks up the object by `SecurityOwnershipFactsRequestTransfer.objectReference`.
     * - Returns the owner and, when the object is shared with `SecurityOwnershipFactsRequestTransfer.subject`, the shared access (`read` or `write`).
     * - Returns null when no such object exists; the voter then denies.
     *
     * @api
     */
    public function provideOwnershipFacts(
        SecurityOwnershipFactsRequestTransfer $securityOwnershipFactsRequestTransfer
    ): ?SecurityOwnershipContextTransfer;
}
