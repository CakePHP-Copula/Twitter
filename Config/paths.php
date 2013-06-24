<?php
$config['Copula']['Twitter']['read'] = array(
	'application' => array(
		'rate_limit' => array(
			'path' => 'application/rate_limit_status.json',
			'optional' => array('resources') // comma delimited list of sections, see https://dev.twitter.com/docs/api/1.1/get/application/rate_limit_status
		)
	),
	'favorites' => array(
		'list' => array(
			'path' => 'favorites/list.json',
			'optional'
		)
	),
	'lists' => array(
		'lists' => array(
			'path' => 'lists/lists.json',
			'optional' => array('user_id', 'screen_name')
		),
		'statuses' => array(
			'path' => 'lists/statuses.json', //requires either a list_id, or slug AND one of: owner_id, owner_screen_name
			'optional' => array('list_id', 'slug', 'owner_screen_name', 'owner_id', 'since_id', 'max_id', 'count', 'include_entities', 'include_rts')
		),
		'memberships' => array(
			'path' => 'lists/memberships.json',
			'optional' => array('user_id', 'screen_name', 'cursor', 'filter_to_owned_lists')
		),
		'subscribers' => array(
			'path' => 'lists/subscribers.json',//requires either a list_id, or slug AND one of: owner_id, owner_screen_name
			'optional' => array('list_id', 'slug', 'owner_screen_name', 'owner_id', 'cursor', 'include_entities', 'skip_status')
		),
		'show' => array(
			'subscribers' => array(
				'path' => 'lists/subscribers/show.json',//requires either a list_id, or slug AND one of: owner_id, owner_screen_name
				'required' => array('user_id', 'screen_name'),
				'optional' => array('owner_screen_name', 'owner_id', 'list_id', 'slug', 'include_entities', 'skip_status')
			),
			'members' => array(
				'path' => 'lists/members/show.json',//requires either a list_id, or slug AND one of: owner_id, owner_screen_name
				'required' => array('user_id', 'screen_name'),
				'optional' => array('owner_screen_name', 'owner_id', 'list_id', 'slug', 'include_entities', 'skip_status')
			),
			'show' => array(
				'path' => 'lists/show.json',//requires either a list_id, or slug AND one of: owner_id, owner_screen_name
				'optional' => array('list_id', 'slug', 'owner_screen_name', 'owner_id')
			)
		),
		'members' => array(
			'path' => 'lists/members.json',//requires either a list_id, or slug AND one of: owner_id, owner_screen_name
			'optional' => array('list_id', 'slug', 'owner_screen_name', 'owner_id', 'cursor', 'include_entities', 'skip_status')
		),
		'subscriptions' => array(
			'path' => 'lists/subscriptions.json',//user_id OR screen_name must be provided
			'optional' => array('user_id', 'screen_name', 'count', 'cursor')
		)
	),
	'geo' => array(
	/* additional attributes can be used on the following api calls: search, similar_places, create_place
	 * for more information see here: https://dev.twitter.com/docs/about-geo-place-attributes
	 */
		'id' => array(
			'path' => 'geo/id/:place_id.json' //placeholder:   :place
		),
		'reverse_geocode' => array(
			'path' => 'geo/reverse_geocode.json',
			'required' => array('lat', 'long'),
			'optional' => array('accuracy', 'granularity', 'max_results', 'callback')
		),
		'search' => array(
			'path' => 'geo/search.json',
			'optional' => array('lat', 'long', 'query', 'ip', 'granularity', 'accuracy', 'max_results', 'contained_within', 'callback')
		),
		'similar_places' => array(
			'path' => 'geo/similar_places.json',
			'required' => array('lat', 'long', 'name'),
			'optional' => array('contained_within', 'callback')
		)
	),
	'help' => array(
			'configuration' => array( //if it can't be queried for args, it's pretty pointless
				'path' => 'help/configuration.json'
			),
			'languages' => array(
				'path' => 'help/languages.json'
			),
			'privacy' => array(
				'path' => 'help/privacy.json'
			),
			'tos' => array(
				'path' => 'help/tos.json'
			)
	),
	'saved_searches' => array(
		'list' => array(
			'path' => 'saved_searches/list.json'
		),
		'show' => array(
			'path' => 'saved_searches/show/:id.json', // placeholder:  :id
			'required' => array('id')
		)
	),
	'trends' => array(
		'place' => array(
			'path' => 'trends/place.json',
			'required' => array('id'),
			'optional' => array('exclude') // must be set to 'hashtags' if present
		),
		'available' => array(
			'path' => 'trends/available.json'
		),
		'closest' => array(
			'path' => 'trends/closest.json',
			'required' => array('lat', 'long')
		)
	)
);

$config['Copula']['Twitter']['create'] = array(
	'lists' => array(
		'create' => array(
			'path' => 'lists/create.json',
			'required' => array('name'),
			'optional' => array('mode', 'description') //mode is either 'private' or 'public'
		),
		'destroy' => array(
			'path' => 'lists/destroy.json', //requires either a list_id, or slug AND one of: owner_id, owner_screen_name
			'optional' => array('owner_screen_name', 'owner_id', 'list_id', 'slug')
		),
		'members' => array(
			'create' => array(
				'path' => 'lists/members/create.json', //requires either a list_id, or slug AND one of: owner_id, owner_screen_name
				'required' => array('user_id', 'screen_name'),
				'optional' => array('list_id', 'slug', 'owner_screen_name', 'owner_id')
			),
			'create_all' => array(
				'path' => 'lists/members/create_all.json', //requires either a list_id, or slug AND one of: owner_id, owner_screen_name
				'optional' => array('list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id')
			),
			'destroy' => array(
				'path' => 'lists/members/destroy.json', //requires either a list_id, or slug AND one of: owner_id, owner_screen_name
				'optional' => array('list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id')
			),
			'destroy_all' => array(
				'path' => 'lists/members/destroy_all.json', //requires either a list_id, or slug AND one of: owner_id, owner_screen_name
				'optional' => array('owner_screen_name', 'owner_id', 'list_id', 'slug', 'user_id', 'screen_name')
		)
		),
		'subscribers' => array(
			'create' => array(
				'path' => 'lists/subscribers/create.json',//requires either a list_id, or slug AND one of: owner_id, owner_screen_name
				'optional' => array('owner_screen_name', 'owner_id', 'list_id', 'slug')
			),
			'destroy' => array(
				'path' => 'lists/subscribers/destroy.json',//requires either a list_id, or slug AND one of: owner_id, owner_screen_name
				'optional' => array('owner_screen_name', 'owner_id', 'list_id', 'slug')
			)
		),
		'update' => array(
			'path' => 'lists/update.json', //requires either a list_id, or slug AND one of: owner_id, owner_screen_name
			'optional' => array('list_id', 'slug', 'name', 'mode', 'description', 'owner_screen_name', 'owner_id') // mode is either 'private' or 'public'
		)
	),
	'spam' => array(
		'report_spam' => array(
			'path' => 'users/report_spam',
			'optional' => array('screen_name', 'user_id')
		)
	),
	'places' => array(
		'create_place' => array( //see also https://dev.twitter.com/docs/finding-tweets-about-places
			'path' => 'geo/place.json',
			'required' => array('name', 'contained_within', 'token', 'lat', 'long'),
			'optional' => array('callback')
		)
	),
	'saved_searches' => array(
		'create' => array(
			'path' => 'saved_searches/create.json',
			'required' => array('query')
		),
		'destroy' => array( //technically this belongs in 'delete' but it uses HTTP POST
			'path' => 'saved_searches/destroy/:id.json', //placeholder:  :id
			'required' => array('id')
		)
	)
);