<?php
namespace RandomAgent;

class Random_UA {
 
    private static $agentsList = [];
	
    /**
     * Get a random user agent from agents list
     *
     * @param  array $filterBy
     * @return string
     * @throws \Exception
     */
	
    public static function random($filterBy = [])
    {
        $agents = self::loadUserAgents($filterBy);

        if (empty($agents)) {
            throw new \Exception('No user agents matched the filter');
        }

        return $agents[mt_rand(0, count($agents) - 1)];
    }

    /**
     * Get all of the unique values of the deviceCategory field, which can be used for filtering
     * @return array
     */
    public static function getCategories()
    {
        return self::getField('deviceCategory');
    }
	
	/**
     * Get all of the unique values of the platform field, which can be used for filtering
     * @return array
     */
    public static function getPlatforms()
    {
        return self::getField('platform');
    }

    /**
     * This is a helper for the publicly-exposed methods named get...()
     * @param  string $fieldName
     * @return array
     * @throws \Exception
     */
    private static function getField($fieldName)
    {
		self::loadAgentsList();
        $values       = [];
        foreach (self::$agentsList as $agent) {
            if (!isset($agent[$fieldName])) {
                throw new \Exception("Field name \"$fieldName\" not found, can't continue");
            }

            $values[] = $agent[$fieldName];
        }

        return array_values(array_unique($values));
    }

    /**
     * Validates the filter so that no unexpected values make their way through
     *
     * @param array $filterBy
     * @return array
     */
    private static function validateFilter($filterBy = [])
    {
        // Components of $filterBy that will not be ignored
        $filterParams = [
            'vendor',
            'platform',
            'userAgent',
            'deviceCategory',
        ];

        $outputFilter = [];

        foreach ($filterParams as $field) {
            if (!empty($filterBy[$field])) {
                $outputFilter[$field] = $filterBy[$field];
            }
        }

        return $outputFilter;
    }

    /**
     * Returns an array of user agents that match a filter if one is provided
     *
     * @param array $filterBy
     * @return array
     */
    private static function loadUserAgents($filterBy = [])
    {
		self::loadAgentsList();
        $filterBy = self::validateFilter($filterBy);

        $agentStrings = [];

        for ($i = 0; $i < count(self::$agentsList); $i++) {
            foreach ($filterBy as $key => $value) {
                if (!isset(self::$agentsList[$i][$key]) || !self::inFilter(self::$agentsList[$i][$key], $value)) {
                    continue 2;
                }
            }
            $agentStrings[] = self::$agentsList[$i]['userAgent'];
        }

        return array_values($agentStrings);
    }

    /**
     * return if key exist in array of filters
     *
     * @param  $key
     * @param  $array
     * @return bool
     */
    private static function inFilter($key, $array)
    {
        return in_array(strtolower($key), array_map('strtolower', (array) $array));
    }

    /**
     * @return array
     */
    private static function loadAgentsList()
    {
		if(!self::$agentsList){
			if (file_exists(__DIR__ . '/useragents.json')) {
				self::$agentsList = json_decode(file_get_contents(__DIR__ . '/useragents.json'), true);
				return self::$agentsList;
			}else{
				throw new \Exception("Agents json cant find");
			}
		}else{
			return self::$agentsList;
		}
    }
}