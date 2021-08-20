<?php
use quamsta\ApiCacher\FeedHelper;

/**
 * RSS for PHP - small and easy-to-use library for consuming an RSS Feed
 *
 * @copyright  Copyright (c) 2008 David Grudl
 * @license    New BSD License
 * @version    1.5
 */
class RssFeed {
	/** @var int */
	public static $cacheExpire = '1 day';

	/** @var string */
	public static $cacheDir;

	/** @var string */
	public static $userAgent = 'FeedFetcher-Google';

	/** @var SimpleXMLElement */
	protected $xml;

	/**
	 * Loads RSS or Atom feed.
	 * @param  string
	 * @param  string
	 * @param  string
	 * @return Feed
	 * @throws FeedException
	 */
	public static function load($url, $user = null, $pass = null) {
		$xml = self::loadXml($url, $user, $pass);
		if ($xml->channel) {
			return self::fromRss($xml);
		} else {
			return self::fromAtom($xml);
		}
	}

	/**
	 * Loads RSS feed.
	 * @param  string  RSS feed URL
	 * @param  string  optional user name
	 * @param  string  optional password
	 * @return Feed
	 * @throws FeedException
	 */
	public static function loadRss($url, $user = null, $pass = null) {
		$xml = self::loadXml($url, $user, $pass);

		if ($xml) {
			return self::fromRss($xml);
		}

	}

	/**
	 * Loads Atom feed.
	 * @param  string  Atom feed URL
	 * @param  string  optional user name
	 * @param  string  optional password
	 * @return Feed
	 * @throws FeedException
	 */
	public static function loadAtom($url, $user = null, $pass = null) {
		return self::fromAtom(self::loadXml($url, $user, $pass));
	}

	private static function fromRss(SimpleXMLElement $xml) {
		if (!$xml->channel) {
			user_error("Invalid Feed.", E_USER_WARNING);
		}

		self::adjustNamespaces($xml);

		foreach ($xml->channel->item as $item) {
			// converts namespaces to dotted tags
			self::adjustNamespaces($item);

			// generate 'url' & 'timestamp' tags
			$item->url = (string) $item->link;
			if (isset($item->{'dc:date'})) {
				$item->timestamp = strtotime($item->{'dc:date'});
			} elseif (isset($item->pubDate)) {
				$item->timestamp = strtotime($item->pubDate);
			}
		}
		$feed = new self;
		$feed->xml = $xml->channel;
		return $feed;
	}

	private static function fromAtom(SimpleXMLElement $xml) {
		if (!in_array('http://www.w3.org/2005/Atom', $xml->getDocNamespaces(), true)
			&& !in_array('http://purl.org/atom/ns#', $xml->getDocNamespaces(), true)
		) {
			user_error("Invalid Feed", E_USER_WARNING);
		}

		// generate 'url' & 'timestamp' tags
		foreach ($xml->entry as $entry) {
			$entry->url = (string) $entry->link['href'];
			$entry->timestamp = strtotime($entry->updated);
		}
		$feed = new self;
		$feed->xml = $xml;
		return $feed;
	}

	/**
	 * Returns property value. Do not call directly.
	 * @param  string  tag name
	 * @return SimpleXMLElement
	 */
	public function __get($name) {
		return $this->xml->{$name};
	}

	/**
	 * Sets value of a property. Do not call directly.
	 * @param  string  property name
	 * @param  mixed   property value
	 * @return void
	 */
	public function __set($name, $value) {
		throw new Exception("Cannot assign to a read-only property '$name'.");
	}

	/**
	 * Converts a SimpleXMLElement into an array.
	 * @param  SimpleXMLElement
	 * @return array
	 */
	public function toArray(SimpleXMLElement $xml = null) {
		if ($xml === null) {
			$xml = $this->xml;
		}

		if (!$xml->children()) {
			return (string) $xml;
		}

		$arr = [];
		foreach ($xml->children() as $tag => $child) {
			if (count($xml->$tag) === 1) {
				$arr[$tag] = $this->toArray($child);
			} else {
				$arr[$tag][] = $this->toArray($child);
			}
		}

		return $arr;
	}

	/**
	 * Load XML from cache or HTTP.
	 * @param  string
	 * @param  string
	 * @param  string
	 * @return SimpleXMLElement
	 * @throws FeedException
	 */
	private static function loadXml($url, $user, $pass) {
		$data = FeedHelper::getUrl($url);
		return new SimpleXMLElement($data, LIBXML_NOWARNING | LIBXML_NOERROR | LIBXML_NOCDATA);
	}

	/**
	 * Generates better accessible namespaced tags.
	 * @param  SimpleXMLElement
	 * @return void
	 */
	private static function adjustNamespaces($el) {
		foreach ($el->getNamespaces(true) as $prefix => $ns) {
			$children = $el->children($ns);
			foreach ($children as $tag => $content) {
				$el->{$prefix . ':' . $tag} = $content;
			}
		}
	}
}

/**
 * An exception generated by Feed.
 */
class FeedException extends Exception {
}
