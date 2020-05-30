<?php

class qa_html_theme extends qa_html_theme_base
{
	public function html()
	{
		
		$this->output(
			'<html amp lang="en">',
			$attribution
		);

		$this->head();
		$this->body();

		$this->output(
			$attribution,
			'</html>'
		);
	}
	public function head()
	{
		$this->output(
			'<head>'
		);
		$this->output('<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">');
		$this->head_title();
		$this->head_metas();
		$this->head_links();
		$this->head_lines();
		$this->head_custom();
		$this->head_css();
		$this->output('<script async src="https://cdn.ampproject.org/v0.js"></script>',
		'<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>',
		'<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>',
		'</head>');
	}
	
	public function head_metas()
	{
		$this->output('<meta charset="'.$this->content['charset'].'"/>');
		$this->output('<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1"/>');
		if (strlen(@$this->content['description']))
			$this->output('<meta name="description" content="'.$this->content['description'].'"/>');

		if (strlen(@$this->content['keywords'])) // as far as I know, meta keywords have zero effect on search rankings or listings
			$this->output('<meta name="keywords" content="'.$this->content['keywords'].'"/>');
	}
	public function head_links()
	{
		if (isset($this->content['canonical']))
			$this->output('<link rel="canonical" href="'.$this->content['canonical'].'"/>');

		if (isset($this->content['feed']['url']))
			$this->output('<link rel="canonical" type="application/rss+xml" href="'.$this->content['feed']['url'].'" title="'.@$this->content['feed']['label'].'"/>');

		// convert page links to rel=prev and rel=next tags
		if (isset($this->content['page_links']['items'])) {
			foreach ($this->content['page_links']['items'] as $page_link) {
				if (in_array($page_link['type'], array('prev', 'next')))
					$this->output('<link rel="canonical" href="' . $page_link['url'] . '" />');
			}
		}
	}
	
	
	public function head_css()
	{   
		$this->output("<style amp-custom>

@media all {
	h1,
	h2 {
		color: #307e01;
		font-weight: 400
	}
	td,
	td.headline {
		padding: 0 .5em
	}
	.qa-footer,
	.qa-header,
	.qa-main,
	.qa-sidepanel {
		position: relative
	}
	.qa-a-item-clear,
	.qa-c-item-clear,
	.qa-footer,
	.qa-footer-clear,
	.qa-nav-main-clear,
	.qa-nav-sub-clear,
	.qa-page-links-clear,
	.qa-q-item-clear,
	.qa-q-view-clear,
	h2 {
		clear: both
	}
	.qa-form-tall-table,
	.qa-form-wide-table,
	table {
		border-collapse: collapse
	}
	body {
		margin: 0;
		padding: 0;
		text-align: center
	}
	body,
	input,
	textarea {
		font-size: 14px;
		font-family: 'Open Sans', 'Trebuchet MS', Arial, Helvetica, sans-serif
	}
	a:active,
	a:link,
	a:visited {
		text-decoration: none;
		outline: 0
	}
	.qa-error a,
	.qa-nav-footer a,
	a:hover {
		text-decoration: underline
	}
	a img {
		border: 0
	}
	input,
	textarea {
		outline: 0;
		border: 1px solid #999
	}
	input:focus,
	textarea:focus {
		box-shadow: 0 0 2px #007eff;
		-moz-box-shadow: 0 0 2px #007eff;
		-webkit-box-shadow: 0 0 2px #007eff
	}
	p {
		margin-top: 0
	}
	.qa-body-wrapper {
		width: 100%;
		text-align: left
	}
	.ktlogo {
		width: 46px;
		height: 46px;
		display: block;
		float: right;
		margin: 5px 0 0
	}
	h1 {
		width: 95%;
		margin: 1em 0 .5em;
		font-size: 23px
	}
	a.entry-title,
	h1 a {
		color: #307e01
	}
	h2 {
		font-size: 21px;
		padding-top: 12px
	}
	tr.headline {
		border-top: 1px solid #fb7a31;
		border-bottom: 1px solid #fb7a31;
		background: #ffa
	}
	td.headline {
		width: auto
	}
	td {
		line-height: 25px
	}
	.entry-content table td {
		vertical-align: top;
		line-height: 150%;
		padding-bottom: 10px
	}
	.entry-content table {
		margin-bottom: 20px
	}
	.entry-content caption {
		margin: 20px 0 15px;
		font-size: 15px;
		font-weight: 700
	}
	.qa-template-admin td,
	.qa-template-user td,
	.qa-template-users td,
	.tablebordered td {
		border: 1px solid #ccc
	}
	.qa-error {
		background: #fed8d8;
		border: 1px solid #c00;
		color: #121212;
		font-size: 16px;
		padding: 20px;
		margin: 1em 0;
		-webkit-border-radius: 8px;
		-moz-border-radius: 8px;
		border-radius: 8px;
		background-image: linear-gradient(bottom, #ffa8b5 16%, #ffc7c7 69%);
		background-image: -o-linear-gradient(bottom, #ffa8b5 16%, #ffc7c7 69%);
		background-image: -moz-linear-gradient(bottom, #ffa8b5 16%, #ffc7c7 69%);
		background-image: -webkit-linear-gradient(bottom, #ffa8b5 16%, #ffc7c7 69%);
		background-image: -ms-linear-gradient(bottom, #ffa8b5 16%, #ffc7c7 69%);
		background-image: -webkit-gradient(linear, left bottom, left top, color-stop(.16, #ffa8b5), color-stop(.69, #ffc7c7))
	}
	.qa-error a,
	.qa-error a:hover {
		color: #00f
	}
	.qa-header {
		height: auto;
		margin: 0 auto;
		padding: 10px;
		background: #9acd32
	}
	.qa-sidepanel {
		display: none
	}
	.qa-sidebar {
		width: 100%;
		height: auto
	}
	.fbookframe {
		display: block;
		border: none;
		overflow: hidden;
		width: 120px;
		height: 35px
	}
	.qa-feed {
		padding: 0 0 0 5px;
		margin: 30px 0 10px
	}
	.qa-feed-link {
		font-size: 13px;
		color: #121212;
		padding-left: 20px
	}
	.qa-main {
		float: left;
		width: 100%;
		min-height: 500px;
		padding-left: 20px;
		margin-bottom: 24px;
		margin-left: 5px;
		z-index: 1
	}
	.qa-main-hidden h1 {
		color: #999
	}
	.registrTC {
		background: #f5d3a1;
		display: inline-block;
		padding: 3px
	}
	.qa-footer {
		display: block;
		width: 100%;
		font-size: 15px;
		color: #fff;
		background: #00f
	}
	.qa-search {
		display: none
	}
	.qa-nav-footer {
		position: absolute;
		bottom: 10px;
		right: 10px
	}
	.qa-nav-footer-list {
		margin: 0
	}
	.qa-nav-footer a {
		color: #fff
	}
	.qa-nav-footer-item {
		list-style-type: none
	}
	.qa-footer-img {
		top: 15px;
		display: block;
		width: 50px;
		height: 50px;
		border: 0;
		position: absolute;
		bottom: 0;
		left: 20px
	}
	.qa-footer-phrase {
		position: absolute;
		top: 25px;
		left: 90px;
		font-size: 18px;
		text-shadow: 1px 1px #555
	}
	a.qa-theme-notice {
		position: absolute;
		bottom: 10px;
		left: 10px;
		color: #fff
	}
	.qa-logo {
		margin-bottom: 16px;
		padding-left: 20px;
		padding-top: 10px;
		font-size: 36px
	}
	.qa-logo-link {
		color: #f7f7f7
	}
	.qa-logo-link:hover {
		text-decoration: none;
		border-bottom: 1px solid #fff
	}
	.qa-nav-main,
	.qa-nav-main-item,
	.qa-nav-main-item-opp {
		background: 0 0
	}
	.qa-nav-user {
		float: right;
		clear: right;
		font-size: 12px;
		color: #293d39;
		margin: 10px 20px 0 0;
		white-space: nowrap
	}
	.qa-nav-user-list {
		list-style: none;
		padding: 0;
		margin: 0;
		display: inline
	}
	.qa-nav-user-item {
		display: none;
		margin-left: 12px;
		font-weight: 400
	}
	.qa-nav-user-link {
		color: #e8e8e8;
		text-transform: uppercase
	}
	.qa-logged-in {
		display: inline
	}
	.qa-nav-main-list {
		display: block;
		font-size: 15px;
		list-style: none;
		padding: 0;
		margin: 0
	}
	.qa-nav-main-item {
		float: left;
		padding-left: 10px
	}
	.qa-nav-main-item-opp {
		float: right;
		padding-right: 10px
	}
	.qa-nav-main-link {
		background: 0 0;
		color: #fff;
		display: block;
		padding: 0 10px;
		text-shadow: 2px 0 4px rgba(0, 0, 0, .6)
	}
	.qa-nav-sub,
	.qa-nav-sub-item {
		display: inline-block
	}
	.qa-nav-main-link:hover,
	.qa-nav-main-selected {
		text-shadow: 2px 0 4px #fff
	}
	.qa-nav-sub {
		clear: both;
		background: #eee
	}
	.qa-nav-sub-list {
		font-size: 11px;
		list-style: none;
		padding: 5px 10px;
		margin: 0;
		background: #eee
	}
	.qa-nav-sub-link {
		display: block;
		color: #333;
		text-transform: uppercase;
		text-decoration: none;
		margin-right: 10px;
		padding: 0 5px;
		line-height: 25px
	}
	.qa-nav-sub-link.qa-nav-sub-selected,
	.qa-nav-sub-link:hover {
		color: #222;
		text-decoration: none;
		background: #ddf
	}
	.qa-nav-sub-link.qa-nav-sub-selected {
		font-weight: 700
	}
	#anew h2,
	.qa-nav-cat-link {
		font-weight: 400
	}
	.qa-nav-sub-hot {
		display: none
	}
	.qa-nav-cat-list {
		font-size: 11px;
		list-style: none;
		padding: 0;
		margin: 18px 12px 18px 0
	}
	.qa-nav-cat-item {
		margin: .5em 0
	}
	.qa-nav-cat {
		width: 190px;
		margin: 0 0 10px;
		padding: 0 0 0 3px;
		border: 1px solid #e5e5e5;
		background: #f8f8f8
	}
	.qa-nav-cat-list li {
		padding: 0 10px
	}
	.qa-nav-cat-list .qa-nav-cat-all {
		padding: 0
	}
	.qa-nav-cat-all a,
	.qa-nav-cat-all a:visited {
		padding: 2px 5px;
		color: #444;
		display: block
	}
	.qa-nav-cat-note {
		color: #aaa
	}
	.qa-category-link {
		color: #1e9655;
		text-transform: uppercase;
		font-size: 11px;
		margin-left: 5px
	}
	.qa-q-view-where-data .qa-category-link {
		display: inline-block;
		font-size: 10px;
		margin-left: 0
	}
	#categories_top {
		height: 180px;
		width: 78%;
		padding: 0;
		margin: 20px 0 0 25px;
		-moz-column-count: 3;
		-webkit-column-count: 3;
		column-count: 3
	}
	#categories_top li {
		display: block;
		float: left
	}
	#categories_top li a {
		width: 200px;
		color: #333;
		font-size: 14px;
		margin: 0 7px 10px 0
	}
	#categories_top li a:hover {
		text-decoration: none
	}
	.catselected {
		background: #ffa900
	}
	.qa-page-links {
		margin: 20px 0;
		padding: 12px 0;
		font-size: 14px;
		clear: both
	}
	.qa-page-links-label {
		display: none
	}
	.qa-page-links-list {
		margin: 0;
		padding: 0;
		list-style: none
	}
	.qa-page-links-item {
		text-align: center;
		border: 1px solid #ccc;
		float: left;
		display: inline
	}
	.qa-page-ellipsis,
	.qa-page-link,
	.qa-page-next,
	.qa-page-prev,
	.qa-page-selected {
		display: block;
		padding: 10px 0
	}
	.qa-page-ellipsis,
	.qa-page-link,
	.qa-page-selected {
		width: 40px
	}
	.qa-page-link {
		color: #999;
		background: #f1f1f1
	}
	.qa-page-selected {
		color: #333;
		background-color: #fff
	}
	.qa-page-next,
	.qa-page-prev {
		color: #333;
		background: #f1f1f1;
		padding: 10px 5px
	}
	.qa-page-ellipsis {
		color: #666
	}
	.qa-page-link:hover,
	.qa-page-next:hover,
	.qa-page-prev:hover {
		text-decoration: none;
		background-color: #fff;
		color: #333
	}
	.qa-form-tall-table {
		width: 100%;
		max-width: 700px
	}
	.qa-form-tall-spacer {
		line-height: 1px;
		padding: 0;
		font-size: 1px
	}
	.qa-form-tall-ok {
		color: #090;
		font-size: 18px;
		padding: 6px;
		text-align: center
	}
	.qa-form-tall-label {
		color: #253845;
		padding: 8px;
		font-size: 14px
	}
	.qa-form-tall-data {
		padding: 0 8px 8px;
		min-width: 480px
	}
	.qa-form-tall-number,
	.qa-form-tall-text {
		padding: 3px
	}
	.qa-form-tall-text {
		width: 100%;
		max-width: 480px;
		font-size: 14px;
		line-height: 150%
	}
	.qa-form-tall-number {
		width: 48px;
		border: 1px solid #999
	}
	.qa-form-tall-checkbox {
		float: left;
		margin-right: 4px
	}
	.qa-form-tall-image {
		text-align: center;
		margin-top: 12px
	}
	.qa-form-tall-image img {
		border: 1px solid #000
	}
	.qa-form-tall-error {
		color: #c00;
		font-size: 14px;
		margin-top: 6px;
		display: inline-block
	}
	.qa-form-tall-note {
		margin-top: 6px
	}
	.qa-form-tall-note a {
		color: #293d39;
		text-decoration: underline
	}
	.qa-form-tall-note a:hover {
		color: #396e63
	}
	.qa-form-tall-buttons {
		padding: 24px 8px 8px;
		text-align: center
	}
	.qa-form-wide-table {
		background: #ccc;
		background: -moz-linear-gradient(left, #ccc 0, #fafafa 63%);
		background: -webkit-gradient(linear, left top, right top, color-stop(0, #ccc), color-stop(63%, snow));
		background: -webkit-linear-gradient(left, #ccc 0, snow 63%);
		background: -o-linear-gradient(left, #ccc 0, snow 63%);
		background: -ms-linear-gradient(left, #ccc 0, snow 63%);
		background: linear-gradient(left, #ccc 0, snow 63%)
	}
	.qa-form-wide-spacer {
		line-height: 1px;
		padding: 0;
		font-size: 1px;
		border-bottom: 4px solid #fff;
		background: #fff
	}
	.qa-form-wide-ok {
		color: #090;
		font-size: 18px;
		padding: 6px;
		text-align: center
	}
	.qa-form-wide-label {
		border-bottom: 1px solid #eee;
		color: #253845;
		padding: 10px;
		font-size: 14px;
		font-weight: 400
	}
	.qa-a-count-data,
	.qa-a-item-points-data,
	.qa-a-item-when-data,
	.qa-a-selected-text,
	.qa-activity-count-data,
	.qa-downvote-count-data,
	.qa-q-item-points-data,
	.qa-q-item-when-data,
	.qa-q-view-points-data,
	.qa-q-view-when-data,
	.qa-template-favorites h2,
	.qa-upvote-count-data {
		font-weight: 700
	}
	.qa-form-wide-data {
		border-bottom: 1px solid #eee;
		padding: 6px 10px
	}
	.qa-form-wide-number,
	.qa-form-wide-text {
		padding: 3px
	}
	.qa-form-wide-text {
		width: 320px;
		border: 1px solid #999
	}
	.qa-form-wide-number {
		width: 48px;
		border: 1px solid #999;
		vertical-align: middle
	}
	.qa-form-wide-error {
		color: #c00;
		font-size: 11px;
		margin-left: 6px
	}
	.qa-form-wide-note {
		font-size: 10px;
		margin-left: 4px;
		color: #999
	}
	.qa-form-wide-prefix {
		font-size: 14px
	}
	.qa-form-light-button {
		background: 0 0;
		border: 0;
		height: auto;
		cursor: pointer;
		padding: 0;
		margin-right: 3px;
		font-size: 12px;
		color: #666;
		text-align: left;
		overflow: visible
	}
	.qa-form-light-button:hover {
		color: #000
	}
	.qa-a-item-buttons .qa-form-light-button-edit,
	.qa-a-item-buttons .qa-form-light-button-edit:hover,
	.qa-q-view-buttons .qa-form-light-button-edit,
	.qa-q-view-buttons .qa-form-light-button-edit:hover {
		-webkit-box-shadow: inset rgba(50, 200, 0, .3) 7px 0 0 0;
		-moz-box-shadow: inset rgba(50, 200, 0, .3) 7px 0 0 0;
		box-shadow: inset rgba(50, 200, 0, .3) 7px 0 0 0;
		padding-left: 12px;
		padding-right: 7px
	}
	.qa-a-item-buttons .qa-form-light-button-comment,
	.qa-a-item-buttons .qa-form-light-button-comment:hover,
	.qa-q-view-buttons .qa-form-light-button-comment,
	.qa-q-view-buttons .qa-form-light-button-comment:hover {
		-webkit-box-shadow: inset rgba(0, 40, 250, .3) 7px 0 0 0;
		-moz-box-shadow: inset rgba(0, 40, 250, .3) 7px 0 0 0;
		box-shadow: inset rgba(0, 40, 250, .3) 7px 0 0 0;
		padding-left: 12px;
		padding-right: 7px
	}
	.qa-form-light-button-delete {
		background: #faa
	}
	.qa-a-item-main .qa-a-item-buttons .qa-form-light-button,
	.qa-q-view-buttons .qa-form-light-button {
		cursor: pointer;
		overflow: visible;
		display: inline-block;
		text-decoration: none;
		font-size: 11px;
		letter-spacing: 150%;
		border: 1px solid #aaa;
		outline: 0;
		padding: 5px 10px;
		background: #ddd;
		background: linear-gradient(to bottom, #fff 0, #dcdce1 100%);
		color: #666;
		-webkit-background-clip: padding;
		-moz-background-clip: padding;
		-o-background-clip: padding-box;
		-webkit-border-radius: .2em;
		-moz-border-radius: .2em;
		border-radius: .2em
	}
	.qa-a-item-main .qa-a-item-buttons .qa-form-light-button:hover,
	.qa-q-view-buttons .qa-form-light-button:hover {
		color: #444;
		box-shadow: 0 0 1px #abf
	}
	.qa-form-light-button-answer {
		background-color: #3c8dde;
		background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#599bdc), to(#3072b3));
		background-image: -moz-linear-gradient(#599bdc, #3072b3);
		background-image: -o-linear-gradient(#599bdc, #3072b3);
		background-image: linear-gradient(#599bdc, #3072b3);
		-webkit-background-clip: padding;
		-moz-background-clip: padding;
		-o-background-clip: padding-box;
		-webkit-border-radius: .2em;
		-moz-border-radius: .2em;
		border-radius: .2em;
		border: 1px solid #3072b3;
		color: #fff;
		text-shadow: none;
		zoom: 1
	}
	.qa-form-basic-button {
		margin: 4px 4px 8px 0;
		padding: 4px 8px;
		vertical-align: middle;
		border: 1px solid #bfbfbf;
		color: #206b00;
		text-transform: uppercase
	}
	.qa-form-basic-button:hover {
		border: 1px solid #c1a0b9;
		color: #6a1b56;
		padding: 4px 8px;
		text-transform: uppercase
	}
	.qa-form-basic-note {
		font-size: 11px
	}
	.qa-template-qa .qa-q-list {
		margin-top: 20px
	}
	.qa-q-list-item {
		padding: 10px;
		border-bottom: 1px dotted #999;
		min-height: 100px;
		position: relative
	}
	.qa-q-list .qa-a-count-selected:after,
	.qa-useract-wrapper .qa-a-count-selected:after {
		font-size: 10px;
		color: #995
	}
	.qa-useract-wrapper .qa-a-count-selected:after {
		left: 45px
	}
	.qa-q-item-stats {
		float: left;
		margin-top: 1px
	}
	.qa-q-item-main {
		width: 80%;
		float: left;
		padding-left: 10px
	}
	.qa-q-item-title {
		color: #000;
		font-size: 19px
	}
	.qa-q-item-avatar {
		display: inline-block;
		vertical-align: middle;
		margin: 0 5px 0 0
	}
	.qa-q-item-avatar-meta {
		display: block;
		margin: 10px 0 0
	}
	.qa-q-item-title a {
		color: #07c
	}
	.qa-q-item-meta {
		display: inline-block;
		vertical-align: middle;
		font-size: 12px
	}
	.qa-q-item-who-title {
		font-size: 10px;
		color: #777
	}
	.qa-q-item-tags {
		margin-top: 12px
	}
	.qa-q-item-tag-list {
		list-style: none;
		margin: 0;
		padding: 0;
		display: none
	}
	.qa-q-item-tag-item {
		display: inline
	}
	.qa-q-duplicate {
		font-size: 14px;
		color: #f66
	}
	#tag_hints .qa-tag-link {
		line-height: 17px;
		background: #fff;
		color: #333;
		cursor: default
	}
	.qa-voting {
		display: none;
		float: left;
		width: 50px;
		margin-right: 20px;
		padding-top: 10px
	}
	.qa-template-question .qa-voting {
		display: block
	}
	.qa-vote-buttons {
		position: relative;
		height: 35px;
		width: auto
	}
	.qa-vote-up-button,
	.qa-vote-up-disabled,
	.qa-voted-down-button,
	.qa-voted-up-button {
		border: 0;
		font-size: 1px;
		height: 29px;
		width: 27px
	}
	.qa-vote-up-button,
	.qa-vote-up-disabled {
		color: #f1c96b;
		cursor: pointer
	}
	.qa-vote-up-button {
		background-position: -800px -250px;
		color: #f1c96b
	}
	.qa-vote-up-disabled {
		background-position: -800px -366px;
		color: #ccc;
		cursor: default
	}
	.qa-vote-up-button:hover {
		background-position: -800px -279px;
		color: #f1c96b
	}
	.qa-vote-down-button,
	.qa-vote-down-disabled {
		display: none
	}
	.qa-voted-up-button {
		color: #f1c96b
	}
	.qa-voted-down-button {
		color: #f1c96b;
		display: none
	}
	.qa-downvote-count,
	.qa-upvote-count {
		width: 45px;
		text-align: center;
		float: left
	}
	.qa-voted-down-button:hover {
		background-position: -827px -279px;
		color: #f1c96b;
		display: none
	}
	.qa-vote-one-button {
		position: absolute;
		left: 32px;
		top: 0
	}
	.qa-vote-first-button {
		position: absolute;
		left: 10px;
		top: 0
	}
	.qa-vote-second-button {
		position: absolute;
		left: 53px;
		top: 0
	}
	.qa-netvote-count {
		text-align: center;
		display: block
	}
	.qa-netvote-count-data {
		font-size: 20px
	}
	.qa-netvote-count-pad {
		font-size: 12px;
		display: none
	}
	.qa-upvote-count {
		display: block
	}
	.qa-upvote-count-data {
		font-size: 20px;
		display: block
	}
	.qa-upvote-count-pad {
		font-size: 12px
	}
	.qa-downvote-count {
		display: none
	}
	.qa-downvote-count-data {
		font-size: 20px;
		display: block;
		display: none
	}
	.qa-downvote-count-pad {
		font-size: 12px;
		display: none
	}
	.quvotes {
		display: block;
		position: absolute;
		left: 91px;
		top: 16px;
		padding: 3px 4px 2px;
		width: 21px;
		font-size: 11px;
		border-radius: 5px;
		cursor: default
	}
	.qa-a-count {
		width: 90px;
		float: left;
		margin-right: 20px;
		padding: 0;
		text-align: center
	}
	.qa-a-count-data {
		font-size: 23px
	}
	.qa-a-count-pad {
		font-size: 12px;
		display: block
	}
	.qa-top-tags-table {
		margin-bottom: 1em;
		border-collapse: separate;
		border-spacing: 0 5px
	}
	.qa-top-tags-count {
		padding: 6px 8px 6px 12px;
		background: #e9e990;
		text-align: right;
		color: #123;
		font-size: 12px;
		border: 1px solid #ccc;
		border-right: 1px dashed #ccc
	}
	.qa-top-tags-label {
		border: 1px solid #ccc;
		border-left: none;
		background: #e9ffad;
		padding: 4px 16px 0 8px
	}
	.qa-top-tags-spacer {
		padding: 0 4px;
		border: 0
	}
	.qa-top-tags-label .qa-tag-link {
		background: 0 0;
		border: 0;
		color: #222;
		font-size: 12px
	}
	.qa-top-tags-label .qa-tag-link:hover {
		text-decoration: underline;
		background: 0 0
	}
	.qa-top-users-table {
		float: left;
		border-collapse: collapse;
		margin-bottom: 1em
	}
	.qa-top-users-label {
		border: 1px solid #c0b600;
		border-right: 1px dashed #c1c5a9;
		padding: 6px 16px 6px 12px;
		text-align: left
	}
	.qa-top-users-badges,
	.qa-top-users-score {
		background: #ffffe6;
		border-color: #c0b600;
		border-style: solid solid solid none;
		border-width: 1px;
		color: #121212;
		padding: 6px 12px;
		text-align: right;
		font-size: 14px
	}
	.qa-top-users-table .qa-top-users-score {
		font-weight: 700
	}
	.qa-top-users-spacer {
		padding: 0 4px
	}
	.qa-q-view {
		position: relative;
		padding: 10px 0 0 10px
	}
	.qa-view-count {
		display: block;
		position: absolute;
		top: 100px;
		left: 28px;
		color: #888;
		font-size: 11px
	}
	.qa-q-view-avatar,
	.qa-q-view-meta {
		display: inline-block;
		vertical-align: middle
	}
	.qa-q-view-main {
		float: left;
		width: 550px;
		padding-left: 10px
	}
	.qa-q-view-content {
		font-size: 20px;
		line-height: 150%;
		margin-bottom: 25px;
		margin-top: 15px
	}
	.qa-q-view-avatar {
		margin-right: 8px
	}
	.qa-q-view-meta {
		font-size: 13px
	}
	.qa-q-view-follows {
		font-size: 14px;
		margin-bottom: 12px
	}
	.qa-q-view-tags {
		clear: both;
		margin-bottom: 12px
	}
	.qa-q-view-tag-list {
		list-style: none;
		margin: 0;
		padding: 0
	}
	.qa-q-view-tag-item {
		display: inline
	}
	.qa-q-view-buttons {
		margin-top: 16px;
		clear: both
	}
	.qa-q-view-c-list {
		clear: both;
		margin: 24px 0 0 24px;
		border-top: 1px solid #ccc
	}
	.qa-q-view-hidden .qa-voting {
		color: #ccc
	}
	.qa-q-view-hidden .qa-q-view-content {
		color: #999
	}
	.qa-q-view-hidden .qa-q-view-meta {
		color: #ccc
	}
	.qa-q-view-hidden .qa-user-link {
		color: #999
	}
	.qa-q-view-hidden .qa-category-link {
		color: #999;
		text-transform: uppercase
	}
	.qa-a-list-item {
		position: relative;
		min-height: 150px;
		margin-bottom: 40px;
		padding: 15px 0 1px 10px
	}
	.qa-a-list-item-hidden .qa-voting {
		color: #ccc
	}
	.qa-a-list-item-hidden .qa-a-item-content {
		color: #999
	}
	.qa-a-list-item-hidden .qa-a-item-meta,
	.qa-a-list-item-hidden .qa-a-item-what {
		color: #ccc
	}
	.qa-a-list-item-hidden .qa-user-link {
		color: #999
	}
	.qa-a-item-main {
		float: left;
		width: 550px;
		display: inline-block;
		padding: 0 0 10px 10px
	}
	.qa-a-list-item-selected {
		background: #fff;
		background: -moz-linear-gradient(top, #fcf682 0, #fffffc 140px);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fcf682), color-stop(140px, #fffffc));
		background: -webkit-linear-gradient(top, #fcf682 0, #fffffc 140px);
		background: -o-linear-gradient(top, #fcf682 0, #fffffc 140px);
		background: -ms-linear-gradient(top, #fcf682 0, #fffffc 140px);
		background: linear-gradient(to bottom, #fcf682 0, #fffffc 140px)
	}
	img {
		width: 100%
	}
	.qa-a-item-content {
		font-size: 20px;
		line-height: 150%;
		margin-bottom: 25px display: block;
		margin-top: 26px
	}
	.qa-a-item-avatar {
		display: inline-block;
		vertical-align: middle;
		margin-right: 8px
	}
	.qa-a-item-meta {
		display: inline-block;
		vertical-align: middle;
		font-size: 13px
	}
	.qa-a-item-who-title,
	.qa-q-view-who-title {
		font-size: 10px;
		color: #555;
		padding: 4px 5px;
		margin: 0 5px 0 2px;
		border: 1px solid #dcdcdc;
		-moz-border-radius: 6px;
		-webkit-border-radius: 6px;
		border-radius: 6px;
		cursor: default;
		background-color: #ededed;
		background: -webkit-gradient(linear, left top, left bottom, color-stop(.05, #ededed), color-stop(1, #dfdfdf));
		background: -moz-linear-gradient(center top, #ededed 5%, #dfdfdf 100%);
		-moz-box-shadow: inset 0 1px 1px 0 #fff;
		-webkit-box-shadow: inset 0 1px 1px 0 #fff;
		box-shadow: inset 0 1px 1px 0 #fff
	}
	.qa-a-item-buttons {
		margin-top: 16px
	}
	.qa-a-item-c-list {
		clear: both;
		margin: 24px 0 0 24px;
		border-top: 1px solid #ccc
	}
	.qa-a-item-flags,
	.qa-c-item-flags,
	.qa-q-view-flags {
		display: none
	}
	.qa-a-selection {
		position: absolute;
		left: 22px;
		top: 120px;
		width: 60px;
		text-align: center
	}
	.qa-a-selected,
	.qa-a-unselect-button {
		height: 49px;
		width: 50px
	}
	.qa-a-item-selected .qa-a-selection {
		left: auto;
		right: 10px;
		top: 10px
	}
	.qa-a-unselect-button {
		border: 0
	}
	.qa-a-selected {
		margin: 0 auto
	}
	.qa-a-selected-text {
		font-size: 10px;
		display: block;
		margin-top: 6px
	}
	.qa-c-list-item {
		font-size: 12px;
		border-bottom: 1px solid #ccc;
		padding: 8px 0 5px 8px
	}
	.qa-c-list-item:nth-of-type(odd) {
		background-color: #f7f7f7
	}
	.qa-c-item-hidden .qa-c-item-content {
		color: #bbb
	}
	.qa-c-item-hidden .qa-c-item-link {
		color: #aaf
	}
	.qa-c-item-hidden .qa-c-item-meta,
	.qa-c-item-hidden .qa-c-item-what {
		color: #ccc
	}
	.qa-c-item-hidden .qa-c-item-who-title,
	.qa-c-item-hidden .qa-user-link {
		color: #999
	}
	.qa-c-item-link {
		display: block;
		margin-bottom: 6px
	}
	.qa-c-item-expand {
		display: block;
		color: #666;
		font-style: italic;
		margin: 4px 0
	}
	.qa-c-item-content {
		display: block;
		color: #333;
		margin-bottom: 6px
	}
	.qa-c-item-footer {
		position: relative;
		margin-top: 15px
	}
	.qa-c-item-avatar {
		display: inline-block;
		vertical-align: middle;
		margin-right: 4px
	}
	.qa-c-item-meta {
		display: inline-block;
		vertical-align: bottom;
		font-size: 10px;
		color: #666;
		margin-bottom: 1px
	}
	.qa-c-item-what {
		color: #338
	}
	.qa-c-item-who-title {
		font-size: 8px;
		color: #777
	}
	.qa-c-item-who-points {
		display: none
	}
	.qa-c-item-buttons {
		display: block;
		position: absolute;
		bottom: 0;
		right: 0
	}
	.qa-c-item-buttons .qa-form-light-button {
		background: 0 0;
		height: auto;
		font-size: 10px;
		padding: 0
	}
	.qa-related-qs {
		width: 195px;
		margin: 30px 0 40px -10px
	}
	.qa-related-qs h2 {
		margin-bottom: 0;
		font-size: 20px;
		color: #0e770e
	}
	.qa-related-q-list {
		list-style-type: square;
		background: #ffc;
		color: #72a13e;
		padding: 10px 0 10px 10px;
		border: 2px solid #72a13e;
		width: 185px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		-moz-box-shadow: 0 0 10px #aaa;
		-webkit-box-shadow: 0 0 10px #aaa;
		box-shadow: 0 0 10px #aaa
	}
	.qa-related-q-list a {
		color: #163300
	}
	.qa-related-q-item {
		border-bottom: 1px dashed #acacac;
		padding: 10px 0
	}
	.qa-related-q-item:first-child {
		padding-top: 0
	}
	.qa-related-q-item:last-child {
		padding-bottom: 0;
		border-bottom: 0
	}
	ul.qa-related-q-list {
		margin-top: 4px
	}
	.qa-activity-count {
		font-size: 13px;
		padding: 5px 0 5px 15px;
		background: #fafafa;
		border: 1px solid #ddd;
		width: 80%;
		margin-bottom: 30px
	}
	.qa-activity-count-item {
		margin: .25em 0
	}
	.qa-user-link {
		color: #206b00
	}
	#tagcloud a,
	.qa-tag-link {
		height: 16px;
		display: inline-block;
		display: -moz-inline-stack;
		background: #eee;
		margin: 0 4px 3px 0;
		padding: 4px 9px 2px;
		vertical-align: middle;
		font-size: 11px;
		color: #666;
		text-decoration: none;
		border-bottom: 1px solid #ccc;
		border-right: 1px solid #ccc;
		-webkit-border-radius: 2px;
		-moz-border-radius: 2px;
		border-radius: 2px
	}
	.qa-avatar-link,
	.qa-avatar-link:hover,
	.qa-tag-link:hover {
		text-decoration: none
	}
	.qa-tag-link:hover {
		background: #e7e7ea;
		color: #333
	}
	#tagcloud a {
		background: #bcf;
		color: #333
	}
	#tagcloud a:hover {
		background: #9af
	}
	.tagcloudhead {
		font-size: 15px;
		margin: 50px 0 10px
	}
	.qa-avatar-image {
		border: 0;
		vertical-align: middle
	}
	#anew h2 a,
	.badge-notify a,
	.badge-title:hover,
	.qa-main p a {
		text-decoration: underline
	}
	.content-flow {
		max-width: 965px;
		margin: 7px auto 0;
		clear: both
	}
	.content-wrapper {
		padding-top: 20px;
		border: 1px solid #c8c8c8;
		border-bottom: 0;
		background: #e6e6e6;
		background: -moz-linear-gradient(left, #e6e6e6 0, #fafafa 20%);
		background: -webkit-gradient(linear, left top, right top, color-stop(0, #e6e6e6), color-stop(20%, #fafafa));
		background: -webkit-linear-gradient(left, #e6e6e6 0, #fafafa 20%);
		background: -o-linear-gradient(left, #e6e6e6 0, #fafafa 20%);
		background: -ms-linear-gradient(left, #e6e6e6 0, #fafafa 20%);
		background: linear-gradient(to right, #e6e6e6 0, #fafafa 20%);
		box-shadow: 0 2px 5px #aaa
	}
	.qa-logged-in-pad {
		color: #d0d0d0;
		font-size: 13px;
		font-family: Arial, Helvetica, sans-serif
	}
	.qa-logged-in-data .qa-user-link {
		color: #fff;
		font-size: 13px
	}
	.qa-nav-cat a {
		color: #07c
	}
	a {
		outline: 0
	}
	#qa-share-buttons {
		margin-top: 20px
	}
	.qa-favorite-button,
	.qa-favorite-image,
	.qa-unfavorite-button {
		display: block;
		border: 0;
		height: 24px;
		width: 24px;
		cursor: pointer
	}
	.qa-favorite-image,
	.qa-waiting {
		display: inline-block;
		vertical-align: middle
	}
	#asknow,
	#teaser {
		border-bottom: 1px dotted #aaa
	}
	.qa-favorite-button {
		background-position: -300px -369px
	}
	.qa-favorite-button:hover,
	.qa-unfavorite-button,
	.qa-unfavorite-button:hover {
		background-position: -300px -320px
	}
	.qa-favorite-image {
		margin: 0 5px;
		cursor: default
	}
	.qa-favoriting {
		position: absolute;
		right: 20px;
		top: 30px
	}
	.qa-template-favorites h2 {
		font-size: 18px;
		color: #111;
		padding: 5px 10px;
		clear: both;
		background: #ddd
	}
	.qa-waiting {
		width: 14px;
		height: 14px;
		font-size: 0;
		margin: 0 8px 0 4px
	}
	.badge-title {
		font-size: 24px
	}
	.badge-pointer {
		font-size: 14px
	}
	.badge-bronze-medal,
	.badge-gold-medal,
	.badge-silver-medal {
		font-size: 30px
	}
	.qa-sidebar a {
		color: #fff
	}
	.qa-sidebar ul {
		padding: 0 0 0 10px
	}
	a.qa-a-item-what,
	a.qa-q-item-what,
	a.qa-q-view-what {
		color: #121212
	}
	#share-fb-like iframe {
		width: 115px
	}
	.introdialog {
		padding: 20px 20px 0;
		font-size: 19px;
		color: #454545
	}
	#cke_content {
		width: 680px
	}
	.cke_icon,
	.cke_off {
		cursor: pointer
	}
	.cke_skin_kama .cke_button .cke_button_image .cke_label {
		display: inline-block;
		cursor: pointer;
		font-size: 10px
	}
	td#cke_top_content:hover {
		background: 0 0
	}
	.cke_dialog_ui_fileButton {
		background: #fc3;
		padding: 5px 10px;
		box-shadow: 2px 2px 4px #444
	}
	#cke_60_label.cke_dialog_ui_labeled_label {
		display: none
	}
	#teaser {
		display: block;
		width: 740px;
		height: 55px;
		margin: 0 20px 20px 0;
		padding: 0 0 0 20px;
		font-size: 15px
	}
	#donation {
		position: relative;
		width: 100%;
		min-height: 86px;
		padding: 10px 10px 20px;
		border: 1px solid #ccc;
		box-shadow: 0 1px 1px #ccc;
		border-radius: 5px;
		background: #fff;
		background: -moz-linear-gradient(top, #fff 0, #d8d4d4 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fff), color-stop(100%, #d8d4d4));
		background: -webkit-linear-gradient(top, #fff 0, #d8d4d4 100%);
		background: -o-linear-gradient(top, #fff 0, #d8d4d4 100%);
		background: -ms-linear-gradient(top, #fff 0, #d8d4d4 100%);
		background: linear-gradient(to bottom, #fff 0, #d8d4d4 100%)
	}
	#donation img {
		float: left;
		margin-right: 15px;
		border: 1px solid #ccc;
		border-radius: 5px
	}
	#donation p {
		margin: 4px 0 0;
		font-size: 16px;
		line-height: 170%
	}
	#donation a:visited {
		color: #00f
	}
	#numQuAnsw {
		position: absolute;
		left: 70px;
		top: 40px;
		width: 80px;
		text-align: center;
		font-size: 28px;
		color: #fff
	}
	#asknow {
		padding-top: 15px;
		font-size: 15px
	}
	#anew h2 {
		font-size: 20px;
		color: #121212
	}
	#nutzbed_label {
		font-size: 14px
	}
	#share-button-email img {
		border: 0
	}
	.eetv_logo {
		float: left;
		display: block;
		width: 125px;
		height: 78px
	}
	.qa-gray-button,
	.qa-history-new-event-link {
		text-decoration: none
	}
	.badge-count-link {
		font-size: 15px;
		border-bottom: 1px dotted #ba0000
	}
	.qa-uf-user-points {
		font-size: 24px
	}
	.qa-uf-user-rank {
		font-size: 18px;
		padding: 0 2px
	}
	.qa-uf-user-upvoteds {
		font-size: 18px
	}
	.shareIT {
		display: inline
	}
	#ytube,
	.ytframe {
		box-shadow: 0 0 10px #666;
		-moz-box-shadow: 0 0 10px #666;
		-webkit-box-shadow: 0 0 10px #666
	}
	#ytubeLink {
		display: block;
		width: 162px;
		height: 109px;
		margin-top: 30px
	}
	#androidLink {
		display: block;
		width: 130px;
		height: 45px;
		margin-top: 50px;
		border: 0;
		cursor: pointer
	}
	.entry-content img {
		max-width: 500px;
		padding: 8px;
		border: 1px solid #eee;
		background: #fff;
		cursor: pointer
	}
	.ask-box-button,
	.btnblue,
	.btngreen,
	.btnyellow,
	.qa-a-select-button,
	.qa-form-tall-button,
	.qa-form-wide-button,
	.qa-suggest-next a,
	.qa-useract-page-links a,
	.sidebarBtn {
		position: relative;
		overflow: visible;
		display: inline-block;
		padding: 5px 12px;
		text-decoration: none;
		border: 1px solid #3072b3;
		border-bottom-color: #2a65a0;
		margin: 4px 0 2px;
		text-shadow: -1px -1px 0 rgba(0, 0, 0, .3);
		font-size: 12px;
		color: #fff;
		white-space: nowrap;
		cursor: pointer;
		outline: 0;
		background-color: #3c8dde;
		background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#599bdc), to(#3072b3));
		background-image: -moz-linear-gradient(#599bdc, #3072b3);
		background-image: -o-linear-gradient(#599bdc, #3072b3);
		background-image: linear-gradient(#599bdc, #3072b3);
		-webkit-background-clip: padding;
		-moz-background-clip: padding;
		-o-background-clip: padding-box;
		-webkit-border-radius: .2em;
		-moz-border-radius: .2em;
		border-radius: .2em;
		zoom: 1
	}
	.qa-form-tall-button-ask {
		padding: 5px 20px
	}
	.mathtool {
		margin-right: 30px;
		padding: 2px 12px
	}
	.stellfrageBtn {
		margin: 4px 0 0;
		font-size: 14px
	}
	.sidebarBtn {
		display: inline-block;
		padding: 5px 10px
	}
	.sidebarBtnWide {
		padding: 5px 40px
	}
	.ask-box-button:hover,
	.btnblue:hover,
	.mathtool:hover,
	.qa-form-light-button-answer:hover,
	.qa-form-tall-button:hover,
	.qa-suggest-next a:hover,
	.qa-useract-page-links a:hover,
	.sidebarBtn:hover,
	.stellfrageBtn:hover {
		background-color: #3c8dde;
		background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#599bdc), to(#3072b3));
		background-image: -moz-linear-gradient(#599bfc, #3072d3);
		background-image: -o-linear-gradient(#599bdc, #3072b3);
		background-image: linear-gradient(#599bdc, #3072b3);
		box-shadow: 0 0 5px #007eff;
		-moz-box-shadow: 0 0 5px #007eff;
		-webkit-box-shadow: 0 0 5px #007eff
	}
	.btngreen {
		padding: 5px 10px;
		color: #444;
		border: 1px solid #999;
		text-shadow: none;
		background: #64c800;
		background: -moz-linear-gradient(top, #e8ffd8 0, #64c800 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #e8ffd8), color-stop(100%, #64c800));
		background: -webkit-linear-gradient(top, #e8ffd8 0, #64c800 100%);
		background: -o-linear-gradient(top, #e8ffd8 0, #64c800 100%);
		background: -ms-linear-gradient(top, #e8ffd8 0, #64c800 100%);
		background: linear-gradient(to bottom, #e8ffd8 0, #64c800 100%)
	}
	.btngreen:hover {
		color: #131;
		-webkit-box-shadow: 0 0 3px #00ae00;
		-moz-box-shadow: 0 0 3px #00ae00;
		box-shadow: 0 0 3px #00ae00
	}
	.btnyellow,
	.qa-a-select-button {
		padding: 5px 10px;
		color: #444;
		border: 1px solid #e1c18f;
		text-shadow: none;
		background: #ffc533;
		background: -moz-linear-gradient(top, #fff8e4 0, #ffc533 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fff8e4), color-stop(100%, #ffc533));
		background: -webkit-linear-gradient(top, #fff8e4 0, #ffc533 100%);
		background: -o-linear-gradient(top, #fff8e4 0, #ffc533 100%);
		background: -ms-linear-gradient(top, #fff8e4 0, #ffc533 100%);
		background: linear-gradient(to bottom, #fff8e4 0, #ffc533 100%)
	}
	.btnyellow:hover,
	.qa-a-select-button:hover {
		color: #131;
		-webkit-box-shadow: 0 0 3px #aeae00;
		-moz-box-shadow: 0 0 3px #aeae00;
		box-shadow: 0 0 3px #aeae00
	}
	.oranged {
		background: #fc0;
		color: #333;
		box-shadow: 0 0 1px #fc0;
		border-color: #fa0
	}
	.qa-a-select-button {
		width: 65px;
		height: 30px;
		font-size: 11px;
		margin-left: -10px
	}
	.qa-a-selection:after {
		pointer-events: none;
		position: absolute;
		top: 12px;
		left: -8px;
		color: #333;
		visibility: visible;
		width: 65px;
		height: 30px;
		font-size: 11px
	}
	.qa-gray-button {
		cursor: pointer;
		overflow: visible;
		display: inline-block;
		font-size: 11px;
		letter-spacing: 150%;
		border: 1px solid #aaa;
		color: #444;
		outline: 0;
		padding: 5px 10px;
		background: #ccc;
		background: -moz-linear-gradient(top, #f4f4f4 0, #c8c8c8 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(100%, #c8c8c8));
		background: -webkit-linear-gradient(top, #f4f4f4 0, #c8c8c8 100%);
		background: -o-linear-gradient(top, #f4f4f4 0, #c8c8c8 100%);
		background: -ms-linear-gradient(top, #f4f4f4 0, #c8c8c8 100%);
		background: linear-gradient(to bottom, #f4f4f4 0, #c8c8c8 100%);
		-webkit-background-clip: padding;
		-moz-background-clip: padding;
		-o-background-clip: padding-box;
		-webkit-border-radius: .2em;
		-moz-border-radius: .2em;
		border-radius: .2em
	}
	.oAQ_share,
	.suggestVideoBtn {
		padding: 5px 18px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		color: #e8f0de;
		border: 1px solid #538312;
		font: 13px/100% Arial, sans-serif;
		-webkit-box-shadow: 0 1px 2px #595;
		-moz-box-shadow: 0 1px 2px #595;
		box-shadow: 0 1px 2px #595;
		background: #4c9607;
		background: -moz-linear-gradient(top, #4c9607 0, #69af07 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #4c9607), color-stop(100%, #69af07));
		background: -webkit-linear-gradient(top, #4c9607 0, #69af07 100%);
		background: -o-linear-gradient(top, #4c9607 0, #69af07 100%);
		background: -ms-linear-gradient(top, #4c9607 0, #69af07 100%);
		background: linear-gradient(to bottom, #4c9607 0, #69af07 100%)
	}
	.entry-content iframe,
	.qa-useract-stat {
		border: 1px solid #ccc
	}
	.oAQ_share:hover,
	.suggestVideoBtn:hover {
		text-decoration: none;
		-webkit-box-shadow: 1px 1px 3px #595;
		-moz-box-shadow: 1px 1px 3px #595;
		box-shadow: 1px 1px 3px #595;
		background: #5aaa19;
		background: -moz-linear-gradient(top, #4e7d0e 0, #5aaa19 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #4e7d0e), color-stop(100%, #5aaa19));
		background: -webkit-linear-gradient(top, #4e7d0e 0, #5aaa19 100%);
		background: -o-linear-gradient(top, #4e7d0e 0, #5aaa19 100%);
		background: -ms-linear-gradient(top, #4e7d0e 0, #5aaa19 100%);
		background: linear-gradient(to bottom, #4e7d0e 0, #5aaa19 100%)
	}
	.remindbest {
		width: 380px;
		padding: 10px 20px;
		font-weight: 400;
		margin-left: 20px
	}
	.qa-c-list-item iframe {
		width: 400px;
		height: 330px
	}
	.qa-useract-stats {
		margin: 8px 0;
		text-align: center
	}
	.qa-useract-stat {
		display: inline-block;
		margin: 0 16px 8px;
		padding: 7px;
		background: #cdf;
		background: -moz-linear-gradient(top, #fff, #dfdfdf);
		background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#dfdfdf));
		background: linear-gradient(linear, left top, left bottom, from(#fff), to(#dfdfdf));
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px
	}
	.qa-useract-count {
		font-size: 18px;
		font-weight: 700
	}
	.qa-useract-wrapper .qa-a-snippet {
		margin-top: 2px;
		color: #555753;
		line-height: 115%
	}
	#topuser {
		padding-top: 30px
	}
	.qa-notice {
		position: relative;
		background: #ffc;
		color: #121212;
		padding: 5px 0;
		font-size: 120%
	}
	.qa-notice a {
		color: #07f;
		text-decoration: underline
	}
	.qa-notice-close-button {
		overflow-y: hidden;
		font-weight: 700;
		position: absolute;
		top: 0;
		right: 6px;
		border: none;
		color: #444;
		font-size: 20px;
		background: 0 0;
		cursor: pointer;
		border-radius: 5px
	}
	span#similar {
		font-weight: 700;
		font-size: 14px
	}
	span#similar a {
		font-weight: 400;
		font-size: 13px
	}
	#dialog-box {
		position: fixed;
		bottom: -180px;
		right: -180px;
		width: 230px;
		height: 110px;
		z-index: 1000;
		border: 1px solid #aad;
		background: #e6f0a3;
		background: -moz-linear-gradient(top, #e6f0a3 0, #d2e638 50%, #c3d825 51%, #dbf043 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #e6f0a3), color-stop(50%, #d2e638), color-stop(51%, #c3d825), color-stop(100%, #dbf043));
		background: -webkit-linear-gradient(top, #e6f0a3 0, #d2e638 50%, #c3d825 51%, #dbf043 100%);
		background: -o-linear-gradient(top, #e6f0a3 0, #d2e638 50%, #c3d825 51%, #dbf043 100%);
		background: -ms-linear-gradient(top, #e6f0a3 0, #d2e638 50%, #c3d825 51%, #dbf043 100%);
		background: linear-gradient(to bottom, #e6f0a3 0, #d2e638 50%, #c3d825 51%, #dbf043 100%);
		box-shadow: 0 0 20px #999;
		-moz-box-shadow: 0 0 20px #999;
		-webkit-box-shadow: 0 0 20px #999;
		outline: 0;
		-webkit-border-radius: 8px;
		-moz-border-radius: 8px;
		border-radius: 8px
	}
	#closeDiv {
		z-index: 1500;
		position: absolute;
		top: 3px;
		right: 3px;
		width: 22px;
		height: 22px;
		cursor: pointer;
		font-weight: 700
	}
	#lightbox-popup {
		background: #000;
		background: rgba(0, 0, 0, .75);
		height: 100%;
		width: 100%;
		position: fixed;
		top: 0;
		left: 0;
		display: none;
		z-index: 1119
	}
	#lightbox-center {
		margin: 6% auto;
		width: auto
	}
	img#lightbox-img {
		padding: 25px;
		background: #fff
	}
	.qa-q-view-closed {
		padding: 10px;
		margin-bottom: 10px;
		background: #ffc;
		border: 1px solid #ccc;
		-webkit-border-radius: 8px;
		-moz-border-radius: 8px;
		border-radius: 8px
	}
	.qa-a-item-avatar-meta,
	.qa-q-view-avatar-meta {
		display: inline-block;
		padding: 5px 10px 5px 5px
	}
	.qa-nav-user-link-anonym {
		color: #e8e8e8;
		text-shadow: 0 0 1.2em #fff;
		font-size: 14px;
		font-weight: 700
	}
	.qa-template-users .qa-main {
		width: 75%
	}
	.qa-template-users .qa-main .qa-avatar-image {
		-moz-box-shadow: 1px 1px 3px #666;
		-webkit-box-shadow: 1px 1px 3px #666;
		box-shadow: 1px 1px 3px #666;
		margin-right: 5px;
		border: 0
	}
	.qa-template-user #avatar .qa-avatar-image {
		border-radius: 10px
	}
	.qa-template-users tr:nth-of-type(even) {
		background-color: #ddd
	}
	.qa-a-item-avatar-meta {
		background: #fafafa;
		background: linear-gradient(top, #fff, #dfdfdf);
		background: -moz-linear-gradient(top, #fff, #dfdfdf);
		background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#dfdfdf));
		-moz-box-shadow: 1px 1px 2px #9aa;
		-webkit-box-shadow: 1px 1px 2px #9aa;
		box-shadow: 1px 1px 2px #9aa;
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px
	}
	.qa-q-view-avatar-meta {
		background: #eee;
		background: linear-gradient(top, #fff, #dfdfdf);
		background: -moz-linear-gradient(top, #fff, #dfdfdf);
		background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#dfdfdf));
		-moz-box-shadow: 1px 1px 2px #9aa;
		-webkit-box-shadow: 1px 1px 2px #9aa;
		box-shadow: 1px 1px 2px #9aa;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px
	}
	.qa-a-item-avatar-meta img.qa-avatar-image,
	.qa-q-item-avatar-meta img.qa-avatar-image,
	.qa-q-view-avatar-meta img.qa-avatar-image {
		-moz-box-shadow: 0 1px 2px #ccc;
		-webkit-box-shadow: 0 1px 2px #ccc;
		box-shadow: 0 1px 2px #ccc;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px
	}
	.qa-a-item-avatar-meta .qa-user-link,
	.qa-q-view-avatar-meta .qa-user-link {
		color: #090;
		font-size: 110%
	}
	.qa-a-item-avatar-meta .qa-a-item-who-data,
	.qa-q-view-avatar-meta .qa-q-view-who-data {
		color: #900
	}
	.anonymQuestList {
		display: block;
		width: 70%;
		margin: 5px 16px 15px 25px;
		padding: 10px 12px;
		background: #eee;
		background: -moz-linear-gradient(top, #fff, #dfdfdf);
		background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#dfdfdf));
		background: linear-gradient(top, #fff, #dfdfdf);
		border: 1px solid #ccc;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px
	}
	.anonymQuestList ul {
		padding-left: 20px;
		margin-bottom: 0
	}
	.qa-history-item-table {
		width: 100%;
		min-width: 500px
	}
	.qa-history-item-type-cell {
		width: 35%
	}
	.qa-history-item-title-cell {
		width: 45%
	}
	.qa-history-item-points-cell {
		width: 20%
	}
	.qa-history-item-date {
		color: #666;
		float: left;
		font: 700 10px Verdana, Sans-Serif;
		letter-spacing: 0;
		padding: 6px 10px;
		text-align: center;
		white-space: normal;
		width: 45px;
		border-radius: 5px;
		border: 1px solid #eee;
		-moz-box-shadow: 1px 1px 3px #aaa;
		-webkit-box-shadow: 1px 1px 3px #aaa;
		box-shadow: 1px 1px 3px #aaa;
		background: #efefef;
		background: -moz-linear-gradient(top, #fafafa 0, #efefef 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(100%, #efefef));
		background: -webkit-linear-gradient(top, #fafafa 0, #efefef 100%);
		background: -o-linear-gradient(top, #fafafa 0, #efefef 100%);
		background: -ms-linear-gradient(top, #fafafa 0, #efefef 100%);
		background: linear-gradient(to bottom, #fafafa 0, #efefef 100%)
	}
	.qa-history-item-date-no {
		font-size: 150%
	}
	.qa-history-item-type {
		padding: 3px
	}
	.qa-history-item-title a {
		color: #111
	}
	.qa-history-item-title a:visited {
		color: #556
	}
	.qa-history-item-points {
		font-weight: 700;
		padding: 10px
	}
	.qa-history-item-points-neg {
		color: Maroon
	}
	.qa-history-item-points-pos {
		color: #333;
		font-size: 13px;
		text-shadow: 1px 1px 1px #fff
	}
	.qa-history-new-event-count {
		background-color: #ff0;
		border: 1px solid #ee0;
		color: #000;
		border-radius: 4px;
		cursor: pointer;
		font-size: 75%;
		font-weight: 700;
		padding: 1px 3px;
		vertical-align: top
	}
	.qa-history-item-table>tbody>tr:hover {
		background: rgba(0, 0, 0, 0)
	}
	table.qa-history-item-table>tbody>tr>td {
		border: 0
	}
	#qa-user-history-main .qa-form-wide-table {
		width: 80%
	}
	#qa-user-history-main table.qa-form-wide-table>tbody>tr>td {
		border-bottom: 1px solid #ccc
	}
	#qa-user-history-main #newevent {
		background: #b4ff63;
		background: -moz-linear-gradient(top, #e8ffd8 0, #b4ff63 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #e8ffd8), color-stop(100%, #b4ff63));
		background: -webkit-linear-gradient(top, #e8ffd8 0, #b4ff63 100%);
		background: -o-linear-gradient(top, #e8ffd8 0, #b4ff63 100%);
		background: -ms-linear-gradient(top, #e8ffd8 0, #b4ff63 100%);
		background: linear-gradient(to bottom, #e8ffd8 0, #b4ff63 100%);
		border-bottom: 3px solid #ccc
	}
	.notify-container {
		left: 0;
		right: 0;
		top: 0;
		padding: 0;
		position: fixed;
		width: 100%;
		z-index: 10000
	}
	.badge-notify {
		background-color: #f6df30;
		color: #444;
		font-weight: 700;
		width: 100%;
		text-align: center;
		font-size: 14px;
		padding: 10px 0;
		position: relative
	}
	.notify-close {
		color: #735005;
		cursor: pointer;
		font-size: 18px;
		line-height: 18px;
		padding: 0 3px;
		position: absolute;
		right: 8px;
		text-decoration: none;
		top: 8px
	}
	#badge-form td {
		vertical-align: top
	}
	.badge-bronze,
	.badge-gold,
	.badge-silver {
		font-size: 12px;
		margin-right: 4px;
		color: #000;
		text-align: center;
		border-radius: 4px;
		width: 120px;
		padding: 5px 8px;
		display: inline-block;
		cursor: default
	}
	.badge-bronze {
		background-color: #cb9114;
		background-image: -webkit-linear-gradient(left center, #cb9114, #edb336, #cb9114, #a97002, #cb9114);
		background-image: -moz-linear-gradient(left center, #cb9114, #edb336, #cb9114, #a97002, #cb9114);
		background-image: -ms-linear-gradient(left center, #cb9114, #edb336, #cb9114, #a97002, #cb9114);
		background-image: -o-linear-gradient(left center, #cb9114, #edb336, #cb9114, #a97002, #cb9114);
		background-image: linear-gradient(left center, #cb9114, #edb336, #cb9114, #a97002, #cb9114);
		border: 1px solid #6c582c
	}
	.badge-silver {
		background-color: #cdcdcd;
		background-image: -webkit-linear-gradient(left center, #cdcdcd, #efefef, #cdcdcd, #ababab, #cdcdcd);
		background-image: -moz-linear-gradient(left center, #cdcdcd, #efefef, #cdcdcd, #ababab, #cdcdcd);
		background-image: -ms-linear-gradient(left center, #cdcdcd, #efefef, #cdcdcd, #ababab, #cdcdcd);
		background-image: -o-linear-gradient(left center, #cdcdcd, #efefef, #cdcdcd, #ababab, #cdcdcd);
		background-image: linear-gradient(left center, #cdcdcd, #efefef, #cdcdcd, #ababab, #cdcdcd);
		border: 1px solid #737373
	}
	.badge-gold {
		background-color: #eedd0f;
		background-image: -webkit-linear-gradient(left center, #eedd0f, #ffff2f, #eedd0f, #ccbb0d, #eedd0f);
		background-image: -moz-linear-gradient(left center, #eedd0f, #ffff2f, #eedd0f, #ccbb0d, #eedd0f);
		background-image: -ms-linear-gradient(left center, #eedd0f, #ffff2f, #eedd0f, #ccbb0d, #eedd0f);
		background-image: -o-linear-gradient(left center, #eedd0f, #ffff2f, #eedd0f, #ccbb0d, #eedd0f);
		background-image: linear-gradient(left center, #eedd0f, #ffff2f, #eedd0f, #ccbb0d, #eedd0f);
		border: 1px solid #7e7b2a
	}
	.badge-bronze-medal {
		color: #cb9114
	}
	.badge-silver-medal {
		color: #cdcdcd
	}
	.badge-gold-medal {
		color: #eedd0f
	}
	.badge-pointer {
		cursor: pointer
	}
	.badge-desc {
		padding-left: 8px
	}
	.badge-count {
		font-weight: 700
	}
	.badge-count-link {
		cursor: pointer;
		color: #992828
	}
	.badge-source {
		text-align: center;
		padding: 0
	}
	.badge-widget-entry {
		white-space: nowrap
	}
	.badge-user-tables table tr,
	.badge-user-tables table tr td,
	.badge-user-tables tr td {
		border: 0
	}
	.badge-container-badge {
		margin-bottom: 5px
	}
	td.badge-user-table {
		padding-right: 25px
	}
	td.badge-entry {
		padding: 5px;
		border: 0
	}
	.badge-users {
		padding-left: 10px
	}
	.qa-part-form-badges-list {
		clear: both
	}
	.qa-template-ask h1 {
		border-bottom: 1px solid #aaa;
		padding-bottom: 5px
	}
	.qa-template-ask tr td {
		border: none
	}
	.qa-template-bestusers-month .qa-main,
	.qa-template-bestusers-year .qa-main,
	.qa-template-page-rewards .qa-main {
		margin: 20px 0 0 60px;
		width: 640px
	}
	.qa-suggest-next {
		display: none
	}
	.sharebox {
		position: relative;
		display: block;
		width: 118px;
		height: 25px;
		float: right;
		margin: 35px 0 0;
		background: #ddd;
		box-shadow: 2px 2px 4px #999
	}
	.shfb,
	.shgp,
	.shlink,
	.shprint,
	.shtw {
		position: absolute;
		display: inline-block;
		border: 0;
		height: 16px;
		width: 16px
	}
	.shlink {
		background-position: -2px -250px;
		left: 4px;
		top: 5px
	}
	.shprint {
		background-position: -22px -250px;
		left: 27px;
		top: 5px
	}
	.shfb {
		background-position: -40px -250px;
		left: 50px;
		top: 5px
	}
	.shgp {
		background-position: -58px -250px;
		left: 73px;
		top: 5px
	}
	.shtw {
		background-position: -76px -250px;
		left: 96px;
		top: 5px
	}
	.shlinktxt {
		display: block;
		width: 115px;
		margin-top: 30px
	}
	.shlinktxt input {
		font-size: 10px;
		color: #555;
		width: 100%
	}
	.noAnswerJustAsk {
		margin: 20px 0 0
	}
	.qa-template-user .qa-sidepanel {
		display: none
	}
	.qa-template-user .qa-main {
		width: 100%;
		font-size: 13px
	}
	.qa-template-user .qa-form-tall-data {
		min-width: 0
	}
	.qa-template-user .qa-form-tall-image {
		background: #fafafa;
		padding: 5px
	}
	.qa-template-user .qa-form-tall-image img {
		border: 0
	}
	.qa-template-user .qa-form-wide-table {
		width: 45%;
		float: left;
		margin: 0 40px 30px 0;
		background: #eee
	}
	.qa-template-user .qa-part-form-activity table {
		background: #ffebd6;
		margin-right: 0;
		border: 2px solid #fda
	}
	.qa-template-user .qa-form-wide-data,
	.qa-template-user .qa-form-wide-label {
		border: 1px solid #ddd
	}
	.qa-template-user h2 {
		display: inline-block;
		width: auto;
		font-size: 18px;
		color: #333;
		padding: 5px 15px;
		background: #eee;
		border-radius: 3px;
		box-shadow: 0 -25px 25px -25px #fff inset;
		border: 1px solid #ddd;
		text-shadow: 1px 1px 0 #fff
	}
	.qa-template-user .qa-part-form-activity h2 {
		display: none
	}
	.qa-template-user h2:nth-child(5) {
		clear: both;
		display: inline-block;
		margin-top: 30px;
		padding: 5px 0 5px 10px;
		width: 72%
	}
	.qa-template-user .qa-form-tall-data:first-child {
		background: #fafafa
	}
	.qa-template-user td .qa-uf-user-a-posts,
	.qa-template-user td .qa-uf-user-a-votes,
	.qa-template-user td .qa-uf-user-c-posts,
	.qa-template-user td .qa-uf-user-downvoteds,
	.qa-template-user td .qa-uf-user-downvotes,
	.qa-template-user td .qa-uf-user-points,
	.qa-template-user td .qa-uf-user-q-posts,
	.qa-template-user td .qa-uf-user-q-votes,
	.qa-template-user td .qa-uf-user-upvoteds,
	.qa-template-user td .qa-uf-user-upvotes {
		font-size: 18px;
		color: #024;
		font-weight: 700
	}
	.qa-template-register .qa-form-tall-note {
		font-size: 12px
	}
	.qa-template-user .qa-part-form-profile #permits {
		display: none
	}
	.qa-template-user .qa-part-message-list {
		display: inline-block;
		width: 45%
	}
	.foot_fb,
	.foot_gp,
	.foot_tw {
		position: absolute;
		top: 7px;
		border: 0;
		height: 32px;
		width: 32px
	}
	.foot_tw {
		background-position: -300px -150px;
		right: 88px
	}
	.foot_gp {
		background-position: -342px -150px;
		right: 48px
	}
	.foot_fb {
		background-position: -383px -150px;
		right: 8px
	}
	.qa-form-basic-button,
	.qa-template-admin,
	.qa-template-admin .qa-form-tall-label,
	.qa-template-admin .qa-form-wide-label,
	.qa-template-badgepage .badge-entry {
		font-size: 13px
	}
	.bmeta {
		position: relative;
		display: inline-block;
		padding: 10px 20px;
		background: #fcfff4;
		background: -moz-linear-gradient(top, #fcfff4 0, #e1e9a0 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fcfff4), color-stop(100%, #e1e9a0));
		background: -webkit-linear-gradient(top, #fcfff4 0, #e1e9a0 100%);
		background: -o-linear-gradient(top, #fcfff4 0, #e1e9a0 100%);
		background: -ms-linear-gradient(top, #fcfff4 0, #e1e9a0 100%);
		background: linear-gradient(to bottom, #fcfff4 0, #e1e9a0 100%);
		box-shadow: 1px 1px 2px #ccc;
		border: 1px solid #ddd;
		border-radius: 3px;
		font-size: 12px;
		margin: 10px 0 0
	}
	.qa-q-list-item-featured.qa-q-closed:after {
		content: none
	}
	.qa-ask-box {
		width: 80%;
		padding: 10px;
		margin-bottom: 20px
	}
	.ask-box-button {
		margin-left: 10px;
		cursor: pointer;
		display: inline-block;
		padding: 7px 10px
	}
	#askboxin {
		width: 70%
	}
	input#askboxin,
	input#title {
		padding: 5px;
		outline: 0;
		background: #fff;
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
		border: 1px solid #aaf;
		box-shadow: 1px 1px 0 #efefef;
		-moz-box-shadow: 1px 1px 0 #efefef;
		-webkit-box-shadow: 1px 1px 0 #efefef
	}
	input#askboxin {
		margin-left: 16px
	}
	.cke_button_label.cke_button__image_label {
		display: inline-block
	}
	.icon,
	.sp_item {
		display: inline-block
	}
	.qa-template-user .qa-favoriting {
		right: 55px
	}
	.qa-template-ask input#email,
	.qa-template-ask input[name=name] {
		width: 220px
	}
	.q2apro_captcha input {
		background: #ffd
	}
	.sp_content {
		width: 100%;
		color: #fff;
		background: #397bbc;
		box-shadow: 1px 1px 3px #444;
		margin: 0 0 20px;
		padding: 10px 0
	}
	.sp_content .container {
		width: 960px;
		margin: 0 auto;
		padding: 20px 0;
		text-align: center
	}
	.sp_header p {
		font-size: 37px;
		font-weight: 700;
		margin-bottom: 40px
	}
	.sp_content .desc>a {
		color: #fff;
		font-size: 18px;
		font-weight: 700;
		margin: 8px 0 0
	}
	.sp_content .desc>p {
		margin: 0 0 10px;
		font-size: 13px
	}
	.sp_item {
		width: 310px;
		border-right: 1px solid #fff
	}
	.sp_item:last-child {
		border-right: none
	}
	.sp_content .qa-ask-box {
		width: 100%;
		margin-top: 20px
	}
	.sp_content .qa-ask-box #askboxin {
		width: 470px
	}
	.icon {
		width: 40px;
		height: 40px;
		margin-top: 10px
	}
	.icon-question {
		background-position: -477px -435px
	}
	.icon-comment {
		background-position: -528px -435px
	}
	.icon-checkmark {
		background-position: -580px -435px
	}
	.askbtn_sidebar {
		padding: 10px 20px;
		margin: 0 0 40px -10px;
		font-size: 17px
	}
	blockquote {
		border-left: 4px solid #eee;
		padding-left: 10px;
		margin-left: 20px
	}
}
@media only screen and (max-width: 1000px) {
	.qa-main {
		width: 70%
	}
	.qa-q-view-main {
		width: 80%;
		max-width: 530px
	}
	.qa-sidepanel {
		display: none
	}
	#teaser {
		width: 75%;
		margin-left: 0
	}
	.author-meta {
		position: static;
		margin-top: 20px
	}
}
@media only screen and (max-width: 850px) {
	.qa-a-item-main,
	.qa-q-view-main {
		width: 70%;
		max-width: 360px
	}
	.askbtn_sidebar {
		margin: 0 0 40px -5px
	}
}
@media only screen and (max-width: 700px) {
	.qa-main,
	.qa-q-item-main {
		padding-left: 0
	}
	.qa-sidepanel {
		display: none
	}
	.qa-main {
		width: 95%
	}
	.qa-a-form,
	.qa-form-tall-table,
	.qa-form-tall-text,
	textarea.qa-form-tall-text {
		width: 95%
	}
	#cke_content,
	#teaser,
	.qa-a-item-main,
	.qa-q-view-main {
		width: 90%
	}
	.entry-content img {
		max-width: 90%
	}
	.qa-c-list-item iframe {
		width: 100%
	}
	#cke_content,
	.qa-template-bestusers-month .qa-main,
	.qa-template-bestusers-year .qa-main,
	.qa-template-page-rewards .qa-main,
	.qa-template-user .qa-form-wide-table,
	.qa-template-users .qa-main {
		width: 95%
	}
	.qa-template-ask .qa-main {
		max-width: 100%
	}
	.qa-q-item-avatar {
		display: inline-block;
		vertical-align: middle;
		margin: 0 5px 0 0;
		position: relative;
		right: 0;
		top: 0
	}
	.qa-c-item-buttons {
		position: static;
		display: block;
		text-align: right
	}
}
@media only screen and (max-width: 550px) {
	.qa-q-view,
	.qa-view-count {
		position: static
	}
	.qa-logo {
		font-size: 25px
	}
	.sp_content .container {
		width: 90%;
		padding: 10px 5%
	}
	.sp_item {
		width: 310px;
		border: 0;
		margin-bottom: 30px
	}
	.icon {
		margin-top: 0
	}
	iframe {
		width: 444px;
		height: 355px;
		margin-left: -5px
	}
	h1 {
		margin-left: 10px;
		font-size: 20px;
		font-weight: 400
	}
	.qa-main {
		margin: 0 0 0 1%;
		width: 99%
	}
	.qa-q-item-main {
		width: 100%
	}
	.qa-template-qa .qa-q-item-main,
	.qa-template-questions .qa-q-item-main,
	.qa-template-unanswered .qa-q-item-main,
	.qa-template-updates .qa-q-item-main {
		width: 80%
	}
	.qa-ask-box {
		margin-bottom: 0
	}
	input#askboxin {
		margin-left: 10px
	}
	input#title {
		padding-right: 0
	}
	.qa-form-tall-data,
	.qa-form-tall-text {
		max-width: 100%;
		min-width: 100%
	}
	#cke_content,
	.qa-form-tall-table {
		width: 100%
	}
	.qa-top-tags-count {
		width: 20px;
		padding: 0
	}
	.qa-top-tags-label {
		padding: 0
	}
	.qa-top-tags-label .qa-tag-link {
		font-size: 10px;
		display: inline-table
	}
	.qa-a-select-button,
	.qa-netvote-count-pad,
	.qa-view-count,
	.qa-vote-count,
	.sharebox {
		display: none
	}
	.qa-template-users h1 {
		margin-left: 0
	}
	.qa-template-users .qa-main {
		margin: 0 0 0 10px
	}
	P.ls_hint {
		width: 57%;
		margin-left: 10px
	}
	#a_email_shown,
	.qa-form-tall-note {
		margin: 20px 0
	}
	.qa-q-view-main {
		width: 100%;
		padding-left: 0
	}
	.qa-a-count {
		width: auto
	}
	.qa-a-selection {
		left: auto;
		right: 5px;
		top: 0
	}
	.qa-a-selection:after {
		content: ''
	}
	.qa-q-list .qa-a-count-selected:after,
	.qa-useract-wrapper .qa-a-count-selected:after {
		left: 3px;
		top: 55px
	}
	.qa-a-count-data {
		font-size: 15px
	}
	.qa-template-user .qa-part-message-list {
		width: 95%
	}
	.qa-form-wide-text {
		width: 250px
	}
	.quvotes {
		left: 20px;
		top: 65px
	}
	.qa-q-item-stats {
		width: 20%
	}
	.qa-view-count {
		text-align: right;
		width: 95%;
		margin: -15px 0 15px
	}
	.qa-q-view-c-list {
		width: 88%
	}
	.qa-q-item-meta {
		max-width: 80%
	}
	.qa-template-question .qa-voting,
	.qa-voting {
		width: 50px;
		position: absolute;
		left: 0;
		top: -25px
	}
	.qa-netvote-count-data {
		font-size: 20px;
		font-weight: 400
	}
	.qa-vote-buttons {
		position: relative;
		height: 30px;
		width: 50px
	}
}
@media only screen and (max-width: 400px) {
	iframe {
		width: 300px;
		height: 242px;
		margin-left: -5px
	}
}
@media print {
	body {
		background: #fcfcfc
	}
	#dialog-box,
	#eetvadbtn,
	#favoriting,
	#nav_left,
	#nav_right,
	#qa-share-buttons,
	#teaser,
	.eetv_logo,
	.noAnswerJustAsk,
	.qa-a-form,
	.qa-a-item-buttons,
	.qa-a-selection,
	.qa-c-item-buttons,
	.qa-footer,
	.qa-nav-main,
	.qa-nav-user,
	.qa-q-view-buttons,
	.qa-sidepanel,
	.qa-view-count,
	.qa-widgets-main-bottom,
	.sharebox,
	.suggestVideoBox,
	.tipsy,
	iframe {
		display: none
	}
	.content-wrapper {
		border: 0
	}
	.qa-main {
		width: 90%
	}
	.qa-a-item-main,
	.qa-q-view-main {
		width: 100%
	}
	.qa-logo>a {
		color: #212121
	}
	h1 {
		font-size: 24px;
		color: #232323;
		width: 650px
	}
	.qa-q-view-main {
		padding-left: 0
	}
	.qa-footer-phrase {
		text-shadow: none
	}
	.qa-a-list-item {
		border-top: 2px double #999
	}
}

		</style>");
		
		
	}
	public function body()
	
	{   
		$this->output('<body');
		$this->body_tags();
		$this->output('>');
		$this->body_header();
		$this->body_content();
		$this->body_footer();
		$this->body_hidden();
		$this->keyframes();
		$this->output('</body>');
		
	}
	
	public function search()
	{
		$search = $this->content['search'];

		$this->output(
			'<div class="qa-search">',
			'<form '.$search['form_tags'].'target="_top" >',
			@$search['form_extra']
		);

		$this->search_field($search);
		$this->search_button($search);

		$this->output(
			'</form>',
			'</div>'
		);
	}
	
	public function q_view_main($q_view)
	{
		$this->output('<div class="qa-q-view-main">');

		if (isset($q_view['main_form_tags']))
			$this->output('<form '.$q_view['main_form_tags'].'>'); // form for buttons on question
		$this->post_avatar_meta($q_view, 'qa-q-view');
		$this->q_view_content($q_view);
		$this->q_view_extra($q_view);
		$this->q_view_follows($q_view);
		$this->q_view_closed($q_view);
		$this->post_tags($q_view, 'qa-q-view');
		$this->view_count($q_view);
		
		
		
		//$this->c_list(@$q_view['c_list'], 'qa-q-view');

		
		
		

		
		$this->c_list(isset($q_view['c_list']) ? $q_view['c_list'] : null, 'qa-q-view');
		
	
		
		if (isset($q_view['main_form_tags'])) {
			$this->form_hidden_elements(@$q_view['buttons_form_hidden']);
			$this->output('</form>');
		}

		

		$this->output('</div> <!-- END qa-q-view-main -->');
	}
	public function a_item_main($a_item)
	{
		$this->output('<div class="qa-a-item-main">');

		$this->post_avatar_meta($a_item, 'qa-a-item');

		if (isset($a_item['main_form_tags']))
			$this->output('<form ' . $a_item['main_form_tags'] . '>'); // form for buttons on answer

		if ($a_item['hidden'])
			$answerState = 'hidden';
		elseif ($a_item['selected'])
			$answerState = 'selected';
		else
			$answerState = null;

		if (isset($answerState))
			$this->output('<div class="qa-a-item-' . $answerState . '">');

		
		if (isset($a_item['error']))
			$this->error($a_item['error']);
		$this->a_item_content($a_item);

		if (isset($answerState))
			$this->output('</div>');

	
		if (isset($a_item['c_list']))


		if (isset($a_item['main_form_tags'])) {
			if (isset($a_item['buttons_form_hidden']))
		
			$this->output('</form>');
			
		}

		$this->output('</div> <!-- END qa-a-item-main -->');
	}
	public function main()
	{
		$content = $this->content;

		$this->output('<div class="qa-main'.(@$this->content['hidden'] ? ' qa-main-hidden' : '').'">');

		$this->widgets('main', 'top');
		$this->page_title_error();

		$this->widgets('main', 'high');

		$this->main_parts($content);

		$this->widgets('main', 'low');

		$this->page_links();
		$this->suggest_next();

		$this->widgets('main', 'bottom');

		$this->output('</div> <!-- END qa-main -->', '');
	}
	
	
	
	public function page_title_error()
	{
		if (isset($this->content['title'])) {
			$favorite = isset($this->content['favorite']) ? $this->content['favorite'] : null;

			if (isset($favorite))
				$this->output('<form ' . $favorite['form_tags'] . '>');

			$this->output('<h1>');
			
			$this->title();
			$this->output('</h1>');

			if (isset($favorite)) {
				$formhidden = isset($favorite['form_hidden']) ? $favorite['form_hidden'] : null;
				$this->form_hidden_elements($formhidden);
				$this->output('</form>');
			}
		}
		if (isset($this->content['error']))
			$this->error($this->content['error']);
	}
	
	public function main_part($key, $part)
	{
		$partdiv = (
			strpos($key, 'custom') === 0 ||
			strpos($key, 'form') === 0 ||
			strpos($key, 'q_list') === 0 ||
			(strpos($key, 'q_view') === 0 && !isset($this->content['form_q_edit'])) ||
			
			strpos($key, 'a_list') === 0 ||
			strpos($key, 'ranking') === 0 ||
			strpos($key, 'message_list') === 0 ||
			strpos($key, 'nav_list') === 0
		);

		if ($partdiv)
			$this->output('<div class="qa-part-'.strtr($key, '_', '-').'">'); // to help target CSS to page parts

		if (strpos($key, 'custom') === 0)
			$this->output_raw($part);

		elseif (strpos($key, 'form') === 0)
			$this->form($part);

		elseif (strpos($key, 'q_list') === 0)
			$this->q_list_and_form($part);

		elseif (strpos($key, 'q_view') === 0)
			$this->q_view($part);


		elseif (strpos($key, 'a_list') === 0)
			$this->a_list($part);

		elseif (strpos($key, 'ranking') === 0)
			$this->ranking($part);

		elseif (strpos($key, 'message_list') === 0)
			$this->message_list_and_form($part);

		elseif (strpos($key, 'nav_list') === 0) {
			$this->part_title($part);
			$this->nav_list($part['nav'], $part['type'], 1);
		}

		if ($partdiv)
			$this->output('</div>');
	}
	public function q_view_stats($q_view)
	{
		$this->output('<div class="qa-q-view-stats">');
		$this->a_count($q_view);

		$this->output('</div>');
	}
	public function voting_inner_html($post)
	{
		$this->vote_count($post);
		$this->vote_clear();
	}
	public function post_meta_who($post, $class)
	{
		if (isset($post['who'])) {
			$this->output('<span class="'.$class.'-who">');

			if (strlen(@$post['who']['prefix']))
				$this->output('<span class="'.$class.'-who-pad">'.$post['who']['prefix'].'</span>');

			if (isset($post['who']['data']))
				$this->output('<span class="'.$class.'-who-data">'.$post['who']['data'].'</span>');

			if (isset($post['who']['title']))
				$this->output('<span class="'.$class.'-who-title">'.$post['who']['title'].'</span>');
			if (strlen(@$post['who']['suffix']))
				$this->output('<span class="'.$class.'-who-pad">'.$post['who']['suffix'].'</span>');

			$this->output('</span>');
		}
	}
	public function footer()
	{
		$this->output('<div class="qam-footer-box">');

		$this->output('<div class="qam-footer-row">');
		$this->widgets('full', 'bottom');
		$this->output('</div> <!-- END qam-footer-row -->');

		parent::footer();
		$this->output('</div> <!-- END qam-footer-box -->');
	}
	

}