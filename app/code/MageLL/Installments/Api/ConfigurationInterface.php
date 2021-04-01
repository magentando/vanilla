<?php
/**
 * Trezo Soluções Web
 *
 * NOTICE OF LICENSE
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to https://www.trezo.com.br for more information.
 *
 * @category Trezo
 *
 * @copyright Copyright (c) 2021 Trezo Soluções Web. (https://www.trezo.com.br)
 *
 * @author Trezo Core Team <contato@trezo.com.br>
 */
declare(strict_types=1);

namespace MageLL\Installments\Api;


use Magento\Framework\App\Config\ScopeConfigInterface;

interface ConfigurationInterface
{
    const PATH_ENABLED = 'catalog/installments/enabled';

    const PATH_MIN_AMOUNT = 'catalog/installments/min_amount';

    const PATH_MAX_INSTALLMENT = 'catalog/installments/max_installments';

    /**
     * @param string $scopeType
     * @param null $scopeCode
     *
     * @return bool
     */
    public function isEnabled($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): bool;

    /**
     * @param string $scopeType
     * @param null $scopeCode
     *
     * @return int
     */
    public function getMinAmount($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): int;

    /**
     * @param string $scopeType
     * @param null $scopeCode
     *
     * @return int
     */
    public function getMaxInstallment($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): int;

    /**
     * @param string $scopeType
     * @param null $scopeCode
     *
     * @return string
     */
    public function exportConfig($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): string;
}
