<?php

namespace mtgsdk;

/**
 * @method string[] array()
 */
class QueryBuilder
{
    const ENDPOINT = "https://api.magicthegathering.io/v1";

    private $type;

    private $params = [];

    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Get a resource by its id
     *
     * @param string $id Resource id
     *
     * @return object
     */
    public function find($id)
    {
        $resourceName = constant($this->type . '::RESOURCE');

        $url      = sprintf("%s/%s/%s", self::ENDPOINT, $resourceName, $id);
        $response = $this->fetch($url, substr($resourceName, 0, strlen($resourceName) - 1));

        return new $this->type($response);
    }

    /**
     * Get a list of resources
     *
     * @param string $url      URL to invoke
     * @param string $type     Class type
     * @param string $resource The REST Resource
     *
     * @return object[]
     */
    public function findMany($url, $type, $resource)
    {
        $data = [];

        $response = json_decode(file_get_contents($url), true);
        $response = $response[$resource];

        if (count($response) > 0) {
            foreach ($response as $item) {
                $data[] = new $type($item);
            }
        }

        return $data;
    }

    /**
     * Adds a parameter to the dictionary of query parameters
     *
     * @param array $arguments Arbitrary keyword arguments.
     *
     * @return self
     */
    public function where(array $arguments)
    {
        foreach ($arguments as $key => $value) {
            $this->params[$key] = $value;
        }

        return $this;
    }

    /**
     * Get all resources, automatically paging through data
     *
     * @return array
     */
    public function all()
    {
        $data = [];

        $page      = 1;
        $fetch_all = true;

        $resourceName = constant($this->type . '::RESOURCE');
        $url          = sprintf("%s/%s", self::ENDPOINT, $resourceName);
        if (isset($this->params['page'])) {
            $page      = $this->params['page'];
            $fetch_all = false;
        }

        while (true) {
            $response = $this->fetch($this->buildUrl($url, $this->params), $resourceName);

            if (count($response) > 0) {
                foreach ($response as $item) {
                    $data[] = new $this->type($item);
                }

                if (!$fetch_all) {
                    break;
                } else {
                    $page++;
                    $this->where(['page' => $page]);
                }
            } else {
                break;
            }
        }

        return $data;
    }

    /**
     * Get all resources and return the result as an array
     *
     * @return string[] Array of resources
     */
    public function __call($name, $args)
    {
        if ($name === 'array') {
            $resourceName = constant($this->type . '::RESOURCE');
    
            $url = sprintf("%s/%s", self::ENDPOINT, $resourceName);
    
            return $this->fetch($this->buildUrl($url, $this->params), $resourceName);
        }
        
        throw new \BadMethodCallException("Method not defined: [$name].");
    }

    /**
     * @param string $url
     * @param string $resourceName
     *
     * @return array
     */
    protected function fetch($url, $resourceName)
    {
        $response = json_decode(file_get_contents($url), true);

        return $response[$resourceName];
    }

    /**
     * @param string   $url
     * @param string[] $params
     *
     * @return string
     */
    protected function buildUrl($url, array $params = [])
    {
        return $url . rtrim('?' . http_build_query($params), '?');
    }
}
