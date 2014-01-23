<?php
namespace Shopify\Entity;

use Shopify\Exception;

class Article extends EntityAbstract
{

    /**
     * @var array
     */
    protected $_options = [
        'limit' => null,
        'page' => null,
        'since_id' => null,
        'created_at_min' => null,
        'created_at_max' => null,
        'updated_at_min' => null,
        'updated_at_max' => null,
        'published_at_min' => null,
        'published_at_max' => null,
        'published_status' => null,
        'fields' => null,
        'popular' => null,
    ];


    /**
     * Get a list of all articles from a certain blog
     *
     * @param $blogId
     * @return \Shopify\Resource\Article[]
     * @throws \Shopify\Exception
     */
    public function getArticles($blogId)
    {
        // Make an API call
        $response = $this->_request('/admin/blogs/' . $blogId . '/articles.json', $this->getOptions());

        //Check if response contains 'application_charge' object
        if (!isset($response['articles'])) {
            throw new Exception('Response is not valid. Response dump: ' . var_export($response, true));
        }

        $articlesList = $response['articles'];

        $articlesObjectsList = [];

        //Parse all application charges
        foreach ($articlesList as $articleData) {
            $articleObject = new \Shopify\Resource\Article();
            $articleObject->fillObjectFromArray($articleData);
            $articlesObjectsList[] = $articleObject;
        }

        return $articlesObjectsList;
    }

    /**
     * Get a count of all articles from a certain blog
     *
     * @param $blogId
     * @return int
     * @throws \Shopify\Exception
     */
    public function getArticlesCount($blogId)
    {
        // Make an API call
        $response = $this->_request('/admin/blogs/' . $blogId . '/articles/count.json', $this->getOptions());

        //Check if response contains 'application_charge' object
        if (!isset($response['count'])) {
            throw new Exception('Response is not valid. Response dump: ' . var_export($response, true));
        }

        return (int)$response['count'];
    }


    /**
     * Get a single article by its ID and the ID of the parent blog
     *
     * @param int $blogId
     * @param int $articleId
     * @return \Shopify\Resource\Article
     * @throws \Shopify\Exception
     */
    public function getArticle($blogId, $articleId)
    {
        // Make an API call
        $response = $this->_request('/admin/blogs/' . $blogId . '/articles/' . $articleId . '.json', $this->getOptions());

        //Check if response contains 'application_charge' object
        if (!isset($response['article'])) {
            throw new Exception('Response is not valid. Response dump: ' . var_export($response, true));
        }

        $articleData = $response['article'];
        $articleObject = new \Shopify\Resource\Article();

        $articleObject->fillObjectFromArray($articleData);

        return $articleObject;
    }


    /**
     * Create a new article for a blog
     *
     * @param int $blogId
     * @param \Shopify\Resource\Article $article
     * @return \Shopify\Resource\Article
     * @throws \Shopify\Exception
     */
    public function createArticle($blogId, \Shopify\Resource\Article $article)
    {
        $response = $this->_request('/admin/blogs/' . $blogId . '/articles.json',
            ['article' => $article->toArray()], EntityAbstract::METH_POST);

        //Check if response contains 'application_charge' object
        if (!isset($response['article'])) {
            throw new Exception('Response is not valid. Response dump: ' . var_export($response, true));
        }

        $articleData = $response['article'];
        $articleObject = new \Shopify\Resource\Article();

        $articleObject->fillObjectFromArray($articleData);

        return $articleObject;
    }

    /**
     * Update an article
     *
     * @param int $blogId
     * @param \Shopify\Resource\Article $article
     * @return \Shopify\Resource\Article
     * @throws \Shopify\Exception
     */
    public function updateArticle($blogId, \Shopify\Resource\Article $article)
    {
        //Check for an ID
        if ((int)$article->getId() <= 0) {
            throw new Exception('Provided entity should have an ID.');
        }

        $response = $this->_request('/admin/blogs/' . $blogId . '/articles/' . $article->getId() . '.json',
            ['article' => $article->toArray()], EntityAbstract::METH_PUT);

        //Check if response contains 'application_charge' object
        if (!isset($response['article'])) {
            throw new Exception('Response is not valid. Response dump: ' . var_export($response, true));
        }

        $articleData = $response['article'];
        $articleObject = new \Shopify\Resource\Article();

        $articleObject->fillObjectFromArray($articleData);

        return $articleObject;
    }


    /**
     * Return a list of all the authors of articles
     *
     * @return array
     * @throws \Shopify\Exception
     */
    public function getAuthors()
    {
        // Make an API call
        $response = $this->_request('/admin/articles/authors.json', $this->getOptions());

        //Check if response contains 'application_charge' object
        if (!isset($response['authors'])) {
            throw new Exception('Response is not valid. Response dump: ' . var_export($response, true));
        }

        return $response['authors'];
    }


    /**
     * Return a list of all the tags of articles
     *
     * @param int|null $blogId
     * @throws \Shopify\Exception
     * @return array
     */
    public function getTags($blogId = null)
    {

        //Check if we have blog id
        $url = '/admin/articles/tags.json';

        if (!is_null($blogId)) {
            $url = '/admin/blogs/' . $blogId . '/articles/tags.json';
        }

        // Make an API call
        $response = $this->_request($url, $this->getOptions());

        //Check if response contains 'application_charge' object
        if (!isset($response['tags'])) {
            throw new Exception('Response is not valid. Response dump: ' . var_export($response, true));
        }

        return $response['tags'];
    }


    /**
     * Delete an article of a blog
     *
     * @param int $blogId
     * @param int $articleId
     *
     * @return void
     */
    public function deleteArticle($blogId, $articleId)
    {
        $this->_request('/admin/blogs/' . $blogId . '/articles/' . $articleId . '.json', [], EntityAbstract::METH_DELETE);
    }
}