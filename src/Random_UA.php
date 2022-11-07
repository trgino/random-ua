<?php
namespace RandomAgent;

class Random_UA {
 
    private static $agentsList = [];

    public static function random($filterBy = []) {
        $agents = self::loadUserAgents($filterBy);

        if (empty($agents)) {
            throw new \Exception('No user agents matched the filter');
        }

        return $agents[mt_rand(0, count($agents) - 1)];
    }

    public static function getCategories() {
        return self::getField('category');
    }

    public static function getPlatforms() {
        return self::getField('platform');
    }
    
    public static function getVendors() {
        return self::getField('vendor');
    }

    private static function getField($fieldName) {
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

    private static function validateFilter($filterBy = []) {

        $filterParams = [
            'platform',
            'vendor',
            'category',
        ];

        $outputFilter = [];

        foreach ($filterParams as $field) {
            if (!empty($filterBy[$field])) {
                $outputFilter[$field] = $filterBy[$field];
            }
        }

        return $outputFilter;
    }

    private static function loadUserAgents($filterBy = []) {
		self::loadAgentsList();
        $filterBy = self::validateFilter($filterBy);

        $agentStrings = [];

        for ($i = 0; $i < count(self::$agentsList); $i++) {
            foreach ($filterBy as $key => $value) {
                if (!isset(self::$agentsList[$i][$key]) || !self::inFilter(self::$agentsList[$i][$key], $value)) {
                    continue 2;
                }
            }
            $agentStrings[] = self::$agentsList[$i]['agent'];
        }

        return array_values($agentStrings);
    }

    private static function inFilter($key, $array) {
        return in_array(strtolower($key), array_map('strtolower', (array) $array));
    }

    private static function loadAgentsList() {
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