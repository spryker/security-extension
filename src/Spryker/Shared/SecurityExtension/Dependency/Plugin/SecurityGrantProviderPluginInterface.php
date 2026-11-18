<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\SecurityExtension\Dependency\Plugin;

use Generated\Shared\Transfer\SecurityGrantCollectionTransfer;
use Generated\Shared\Transfer\SecuritySubjectTransfer;

/**
 * Implement this plugin to contribute permission grants for a security subject.
 */
interface SecurityGrantProviderPluginInterface
{
    /**
     * Specification:
     * - Executed once per plugin on every security decision, in Zed and in Client; results are not cached by the caller.
     * - An exception thrown here is not caught and aborts the decision.
     * - Returns the grants that apply to the given subject.
     * - Returns an empty collection when the provider has nothing for the subject.
     * - Must not throw for an unknown subject type.
     *
     * @api
     */
    public function getGrants(SecuritySubjectTransfer $securitySubjectTransfer): SecurityGrantCollectionTransfer;
}
