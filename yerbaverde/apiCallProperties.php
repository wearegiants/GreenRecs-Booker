<?php

namespace YerbaVerde;

interface apiCallProperties {
	function doSubmitProcess($params);
	function getUniqueName();
	function getDefaultTitle();
	function getTemplate();
	function hasPage();
}