<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace SprykerFeature\Zed\Glossary\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\GlossaryBusiness;
use SprykerEngine\Zed\Kernel\Business\AbstractDependencyContainer;
use SprykerFeature\Zed\Glossary\Business\Key\KeyManagerInterface;
use SprykerFeature\Zed\Glossary\Business\Key\KeySourceInterface;
use SprykerFeature\Zed\Glossary\Business\Translation\TranslationManagerInterface;
use SprykerFeature\Zed\Glossary\Dependency\Facade\GlossaryToLocaleInterface;
use SprykerFeature\Zed\Glossary\Dependency\Facade\GlossaryToTouchInterface;
use SprykerFeature\Zed\Glossary\GlossaryDependencyProvider;
use SprykerFeature\Zed\Glossary\GlossaryConfig;
use SprykerFeature\Zed\Glossary\Persistence\GlossaryQueryContainerInterface;

/**
 * @method GlossaryBusiness getFactory()
 * @method GlossaryConfig getConfig()
 * @method GlossaryQueryContainerInterface getQueryContainer()
 */
class GlossaryDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return TranslationManagerInterface
     */
    public function createTranslationManager()
    {
        return $this->getFactory()->createTranslationTranslationManager(
            $this->getQueryContainer(),
            $this->getTouchFacade(),
            $this->getLocaleFacade(),
            $this->createKeyManager()
        );
    }

    /**
     * @return GlossaryToTouchInterface
     */
    protected function getTouchFacade()
    {
        return $this->getExternalDependency(GlossaryDependencyProvider::TOUCH_FACADE);
    }

    /**
     * @return GlossaryToLocaleInterface
     */
    protected function getLocaleFacade()
    {
        return $this->getExternalDependency(GlossaryDependencyProvider::LOCALE_FACADE);
    }

    /**
     * @return KeyManagerInterface
     */
    public function createKeyManager()
    {
        return $this->getFactory()->createKeyKeyManager(
            $this->createKeySource(),
            $this->getQueryContainer()
        );
    }

    /**
     * @return KeySourceInterface
     */
    protected function createKeySource()
    {
        return $this->getFactory()->createKeyFileKeySource(
            $this->getConfig()->getGlossaryKeyFileName()
        );
    }

    /**
     * TODO remove
     * @throws \Exception
     */
    protected function getLocator()
    {
        throw new \Exception('Not allowed here anymore');
    }
}
