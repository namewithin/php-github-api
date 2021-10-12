<?php

namespace Github\Api\Repository;

use Github\Api\AbstractApi;

/**
 * @link   http://developer.github.com/v3/issues/environments/
 *
 */
class Environments extends AbstractApi
{
    public function all($username, $repository)
    {
        return $this->get('/repos/' . rawurlencode($username) . '/' . rawurlencode($repository) . '/environments');
    }

    public function getIdByName($username, $repository, $repoName)
    {
        $environments = $this->all($username, $repository)['environments'];
        return array_search($repoName, array_column($environments, 'name'));
    }

    public function publicKeyById($username, $repository, $repositoryId, $environment)
    {
        return $this->get(
            '/repositories/' . rawurldecode($repositoryId) . '/environments/' . rawurldecode(
                $environment
            ) . '/secrets/public-key'
        );
    }

}
