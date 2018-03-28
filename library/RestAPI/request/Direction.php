<?php
/**
 * @author: axios
 *
 * @email: axiosleo@foxmail.com
 * @blog:  http://hanxv.cn
 * @datetime: 2018/3/28 14:12
 */

namespace amap\sdk\RestAPI\request;


use amap\sdk\core\exception\RestAPIException;
use amap\sdk\core\traits\RequestTrait;
use amap\sdk\RestAPI\RestAPIRequest;

class Direction
{
    protected $actionArray = [
        'walking'   => 'v3/direction/walking',
        'bus'       => 'v3/direction/transit/integrated',
        'driving'   => 'v3/direction/driving',
        'bicycling' => 'v4/direction/bicycling',
        'truck'     => 'v4/direction/truck',
        'distance'  => 'v3/distance'
    ];

    /**
     * @param $name
     * @param $arguments
     * @return DirectionRequest
     * @throws RestAPIException
     */
    public function __call($name, $arguments)
    {
        if (!isset($this->actionArray[$name])) {
            throw new RestAPIException("action not exist");
        }
        $Class = new DirectionRequest($this->actionArray[$name]);
        return $Class;
    }
}

/**
 * Class DirectionRequest
 * @package amap\sdk\RestAPI\request
 * @method $this setOrigin($origin)
 * @method $this setDestination($destination)
 * @method $this setOutput($output)
 * @method $this setCallback($callback)
 */
class DirectionRequest extends RestAPIRequest{
    use RequestTrait;

    public function __construct(string $action)
    {
        parent::__construct($action);
    }
}