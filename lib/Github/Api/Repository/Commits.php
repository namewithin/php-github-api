<?php

namespace Github\Api\Repository;

use Github\Api\AbstractApi;

/**
 * @link   http://developer.github.com/v3/repos/commits/
 *
 * @author Joseph Bielawski <stloyd@gmail.com>
 */
class Commits extends AbstractApi
{
    const REPOS_PATH = '/repos/';

    public function all($username, $repository, array $params)
    {
        return $this->get(
            self::REPOS_PATH . rawurlencode($username) . '/' . rawurlencode($repository) . '/commits', $params
        );
    }

    public function compare($username, $repository, $base, $head, $mediaType = null)
    {
        $headers = [];
        if (null !== $mediaType) {
            $headers['Accept'] = $mediaType;
        }

        return $this->get(
            self::REPOS_PATH . rawurlencode($username) . '/' . rawurlencode(
                $repository
            ) . '/compare/' . rawurlencode(
                $base
            ) . '...' . rawurlencode($head), [], $headers
        );
    }

    public function show($username, $repository, $sha)
    {
        return $this->get(
            self::REPOS_PATH . rawurlencode($username) . '/' . rawurlencode($repository) . '/commits/' . rawurlencode(
                $sha
            )
        );
    }

    public function pulls($username, $repository, $sha)
    {
        return $this->get(
            self::REPOS_PATH . rawurlencode($username) . '/' . rawurlencode($repository)
            . '/commits/' . rawurlencode($sha) . '/pulls'
        );
    }

    public function branchesWhereHead($username, $repository, $sha)
    {
        return $this->get(
            self::REPOS_PATH . rawurlencode($username) . '/' . rawurlencode($repository)
            . '/commits/' . rawurlencode($sha) . '/branches-where-head'
        );
    }
}
