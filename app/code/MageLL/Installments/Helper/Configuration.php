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

namespace MageLL\Installments\Helper;


use MageLL\Installments\Api\ConfigurationInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Serialize\Serializer\Json as Serializer;

class Configuration extends AbstractHelper implements ConfigurationInterface
{
    /** @var Serializer  */
    private $serializer;

    public function __construct(
        Context $context,
        Serializer $serializer
    )
    {
        parent::__construct($context);
        $this->serializer = $serializer;
    }

    /**
     * @inheritDoc
     */
    public function isEnabled($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): bool
    {
        return (bool)$this->scopeConfig->getValue(static::PATH_ENABLED, $scopeType, $scopeCode);
    }

    /**
     * @inheritDoc
     */
    public function getMinAmount($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): int
    {
        return (int)$this->scopeConfig->getValue(static::PATH_MIN_AMOUNT, $scopeType, $scopeCode);
    }

    /**
     * @inheritDoc
     */
    public function getMaxInstallment($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): int
    {
        return (int)$this->scopeConfig->getValue(static::PATH_MAX_INSTALLMENT, $scopeType, $scopeCode);
    }

    /**
     * @inheritDoc
     */
    public function exportConfig($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): string
    {
        return $this->serializer->serialize([
            'is_enable' => $this->isEnabled($scopeType, $scopeCode),
            'min_amount' => $this->getMinAmount($scopeType, $scopeCode),
            'max_installment' => $this->getMaxInstallment($scopeType, $scopeCode)
        ]);
    }
}
