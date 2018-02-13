<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2017 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShop\Bundle\MoneyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('coreshop_money');

        $this->addPimcoreResourcesSection($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function addPimcoreResourcesSection(ArrayNodeDefinition $node)
    {
        $node->children()
            ->arrayNode('pimcore_admin')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('js')
            ->addDefaultsIfNotSet()
            ->ignoreExtraKeys(false)
            ->children()
            ->scalarNode('core_extension_data_money')->defaultValue('/bundles/coreshopmoney/pimcore/js/coreExtension/data/coreShopMoney.js')->end()
            ->scalarNode('core_extension_tag_money')->defaultValue('/bundles/coreshopmoney/pimcore/js/coreExtension/tags/coreShopMoney.js')->end()
            ->end()
            ->end()
            ->arrayNode('css')
            ->addDefaultsIfNotSet()
            ->ignoreExtraKeys(false)
            ->children()
            ->scalarNode('index')->defaultValue('/bundles/coreshopmoney/pimcore/css/money.css')->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end();
    }
}
