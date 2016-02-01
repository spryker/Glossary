<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Glossary\Business;

use Spryker\Zed\Glossary\Dependency\Facade\GlossaryToMessengerInterface;
use Spryker\Zed\Glossary\Business\Key\KeyManager;
use Spryker\Zed\Glossary\Business\Translation\TranslationManager;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\Glossary\Business\Key\KeyManagerInterface;
use Spryker\Zed\Glossary\Business\Translation\TranslationManagerInterface;
use Spryker\Zed\Glossary\Dependency\Facade\GlossaryToLocaleInterface;
use Spryker\Zed\Glossary\Dependency\Facade\GlossaryToTouchInterface;
use Spryker\Zed\Glossary\GlossaryDependencyProvider;
use Spryker\Zed\Glossary\GlossaryConfig;
use Spryker\Zed\Glossary\Persistence\GlossaryQueryContainerInterface;

/**
 * @method GlossaryConfig getConfig()
 * @method GlossaryQueryContainerInterface getQueryContainer()
 */
class GlossaryBusinessFactory extends AbstractBusinessFactory
{

    /**
     * @return \Spryker\Zed\Glossary\Business\Translation\TranslationManagerInterface
     */
    public function createTranslationManager()
    {
        return new TranslationManager(
            $this->getQueryContainer(),
            $this->getTouchFacade(),
            $this->getLocaleFacade(),
            $this->createKeyManager(),
            $this->getMessagesFacade()
        );
    }

    /**
     * @return \Spryker\Zed\Glossary\Dependency\Facade\GlossaryToTouchInterface
     */
    protected function getTouchFacade()
    {
        return $this->getProvidedDependency(GlossaryDependencyProvider::FACADE_TOUCH);
    }

    /**
     * @return \Spryker\Zed\Glossary\Dependency\Facade\GlossaryToLocaleInterface
     */
    protected function getLocaleFacade()
    {
        return $this->getProvidedDependency(GlossaryDependencyProvider::FACADE_LOCALE);
    }

    /**
     * @return \Spryker\Zed\Glossary\Dependency\Facade\GlossaryToMessengerInterface
     */
    protected function getMessagesFacade()
    {
        return $this->getProvidedDependency(GlossaryDependencyProvider::FACADE_MESSENGER);
    }

    /**
     * @return \Spryker\Zed\Glossary\Business\Key\KeyManagerInterface
     */
    public function createKeyManager()
    {
        return new KeyManager(
            $this->getQueryContainer()
        );
    }

}
