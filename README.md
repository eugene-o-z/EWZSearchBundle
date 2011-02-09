Provides advance search capability to Symfony2 projects.

Installation
============

Requires Zend 2.x Zend/Search/Lucene
You can get it here http://github.com/zendframework/zf2

There are two valid parameters in the lucene.config in your config file:

**Path and Analyzer**

If you want to include numbers in your search queries then you'll need to set
lucene.analyzer to Zend\Search\Lucene\Analysis\Analyzer\Common\TextNum\CaseInsensitive
See http://framework.zend.com/manual/en/zend.search.lucene.extending.html for more information

Here is a yaml example

    search.lucene:
        analyzer: Zend\Search\Lucene\Analysis\Analyzer\Common\TextNum\CaseInsensitive
        path:     %kernel.root_dir%/cache/%kernel.environment%/lucene/index

**To add to the search:**

use Bundle\SearchBundle\Lucene\LuceneSearch;

    $search = $this->get('search.lucene');
    $document = new Document();
    $search->addDocument();
    $search->updateIndex();

**To retrieve a query:**

use Bundle\SearchBundle\Lucene\LuceneSearch;

    $search = $this->get('search.lucene');
    $query = 'Symfony2';
    $results = $search->find($query);
  
See the Zend documentation for more information.
