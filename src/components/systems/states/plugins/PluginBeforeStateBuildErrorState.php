<?php
namespace tratabor\components\systems\states\plugins;

use tratabor\components\systems\Plugin;
use tratabor\components\systems\states\StateError;
use tratabor\interfaces\systems\states\IStateMachine;
use tratabor\interfaces\systems\states\machines\plugins\IPluginBeforeStateBuild;

/**
 * Class PluginBeforeStateBuildErrorState
 *
 * @package tratabor\components\systems\states\plugins
 * @author Funcraft <me@funcraft.ru>
 */
class PluginBeforeStateBuildErrorState extends Plugin implements IPluginBeforeStateBuild
{
    /**
     * @param IStateMachine $machine
     * @param array $stateConfig
     * @param $fromStateId
     * @param $stateId
     *
     * @return array
     */
    public function __invoke(IStateMachine &$machine, $stateConfig, $fromStateId, $stateId)
    {
        if (!is_array($stateConfig)) {
            $errorState = StateError::hideAnError(
                'State config must be an array.',
                $stateConfig,
                $fromStateId,
                $stateId
            );
            $stateConfig = $errorState->__toArray();
        }

        return [$stateConfig, $fromStateId, $stateId];
    }
}
