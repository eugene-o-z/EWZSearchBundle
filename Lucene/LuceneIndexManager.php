<?php
namespace EWZ\Bundle\SearchBundle\Lucene;

use EWZ\Bundle\SearchBundle\Lucene\Lucene;

class LuceneIndexManager{
	/**
	 * array of indices
	 * @var array
	 */
	private $indices = array();

    /**
     * Instanciate of the index manager
     *
     * @param array $indices array of index definitions
     * @param string $basePath basePath for all the indices
     * @param string $indexClass Class for the LuceneSearch instances for each index
     */
    public function __construct(array $indices, $indexClass) {
    	foreach ($indices as $name => $config) {
    		$analyzer = $config['analyzer'];
    		$path = $config['path'];
    		$index = new $indexClass($path, $analyzer);
    		$this->indices[$name] = $index;
    	}
    }

    /**
     * Get the specified lucene search-index
     * @param string $indexName
     * @return LuceneSearch
     */
    public function getIndex($indexName) {
    	if(array_key_exists($indexName, $this->indices)){
	    	return $this->indices[$indexName];
    	}
    	return null;
    }

}
