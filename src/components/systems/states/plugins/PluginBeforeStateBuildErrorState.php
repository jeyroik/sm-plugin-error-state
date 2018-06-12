<?php
namespace tratabor\components\systems\states\plugins;

use tratabor\components\systems\Plugin;
use tratabor\components\systems\states\StateError;
use tratabor\interfaces\systems\states\plugins\IPluginBeforeStateBuild;

/**
 * Class PluginBeforeStateBuildErrorState
 *
 * @package tratabor\components\systems\states\plugins
 * @author Funcraft <me@funcraft.ru>
 */
class PluginBeforeStateBuildErrorState extends Plugin implements IPluginBeforeStateBuild
{
    /**
     * @param array $stateConfig
     * @param string $fromState
     * @param string $stateId
     *
     * @return array
     */
    public function __invoke($stateConfig = [], $fromState = '', $stateId = '')
    {
        if (!is_array($stateConfig)) {
            $errorState = StateError::hideAnError(
                'State config must be an array.',
                $stateConfig,
                $fromState,
                $stateId
            );
            $stateConfig = $errorState->__toArray();
        }

        return [$stateConfig, $fromState, $stateId];
    }
}
