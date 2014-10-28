<?php

/*
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 */

namespace Elcodi\Bundle\RuleBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

use Elcodi\Bundle\RuleBundle\CompilerPass\MappingCompilerPass;
use Elcodi\Bundle\RuleBundle\DependencyInjection\ElcodiRuleExtension;
use Elcodi\Component\Rule\CompilerPass\ContextCompilerPass;
use Elcodi\Component\Rule\CompilerPass\ExpressionLanguageCompilerPass;

/**
 * Class ElcodiRuleBundle
 */
class ElcodiRuleBundle extends Bundle
{
    /**
     * Builds bundle
     *
     * @param ContainerBuilder $container Container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        /**
         * Adds compiler pass
         */
        $container
            ->addCompilerPass(new MappingCompilerPass())
            ->addCompilerPass(new ContextCompilerPass())
            ->addCompilerPass(new ExpressionLanguageCompilerPass());
    }

    /**
     * Returns the bundle's container extension.
     *
     * @return ExtensionInterface The container extension
     */
    public function getContainerExtension()
    {
        return new ElcodiRuleExtension();
    }

    /**
     * Finds and registers Commands.
     *
     * Override this method if your bundle commands do not follow the conventions:
     *
     * * Commands are in the 'Command' sub-directory
     * * Commands extend Symfony\Component\Console\Command\Command
     */
    public function registerCommands()
    {
    }
}
