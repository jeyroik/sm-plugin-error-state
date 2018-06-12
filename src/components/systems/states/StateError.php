<?php
namespace tratabor\components\systems\states;

/**
 * Class StateError
 *
 * @package tratabor\components\systems\states
 * @author Funcraft <me@funcraft.ru>
 */
class StateError extends StateBasic
{
    /**
     * @param $message
     * @param array $data
     * @param string $fromStateId
     * @param string $id
     *
     * @return static
     */
    public static function hideAnError($message, $data = [], $fromStateId = '', $id = '')
    {
        $additional = [
            'error' => [
                'message' => $message,
                'data' => $data
            ]
        ];

        return new static($id, $fromStateId, [], $additional);
    }
}
