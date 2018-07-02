<?php
namespace jeyroik\extas\components\systems\states\plugins;

use jeyroik\extas\components\systems\Plugin;
use jeyroik\extas\components\systems\states\StateError;
use jeyroik\extas\interfaces\systems\states\IStateMachine;
use jeyroik\extas\interfaces\systems\states\machines\plugins\IPluginStateBuildBefore;

/**
 * Class PluginBeforeStateBuildErrorState
 *
 * @package jeyroik\extas\components\systems\states\plugins
 * @author Funcraft <me@funcraft.ru>
 */
class PluginStateBuildErrorStateBefore extends Plugin implements IPluginStateBuildBefore
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
