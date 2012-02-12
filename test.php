<?php
error_reporting(E_ALL);
include 'codespy.php'; 
// All the files included after this will be analyzed for code coverage.
// function addFileToSpy($path) can be used to restrict this to a set of specific files only.
include 'sampleclass.php';

\codespy\Analyzer::$outputdir = 'g:\work\easyphp-5.3.6.1\www\crxml\output';
// Output directory to which the analyzer writes its output if using html format. Must be script writable.

\codespy\Analyzer::$outputformat = 'html';
// Output format. 
// Supported formats, html,vim,php and text
// html : writes html files, one for each analyzed file that contain the sourcecode with executed lines highlighted in red.
// vim :  outputs vim command for each of the files that can be used to highlight the executed lines in a vim window displaying the respective source file
// php : outputs a 2 dimensional array in php format with lines executed for each of analyzed file.
// text : outputs the executed lines for each analyzed file

$t = new sampleClass;
echo $t->factorial(5);
//Codespys destructor will write to stdout or files after the script terminates.
