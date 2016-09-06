<?php

namespace mtgsdk;

/**
 * @property-read $id
 * @property-read $version
 * @property-read $details
 * @property-read $releaseDate
 */
class Changelog
{
    use DataBag, QueriesAll;

    const RESOURCE = 'changelogs';
}
