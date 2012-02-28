<?php
error_reporting(E_ALL);
include 'codespy.php'; 
// All the files included after this will be analyzed for code coverage.
// function addFileToSpy($path) can be used to restrict this to a set of specific files only.


//This line should follow the include for codespy.php.
//This function adds a function or class method to the list of functions to analyze for path coverage
// syntax:
// addFunctionToAnalyze('file_path','method or function name','class name/leave blank for adding functions');

\codespy\Analyzer::addFunctionToAnalyze('sampleclass.php','factorial','sample_object');
\codespy\Analyzer::addFunctionToAnalyze('sampleclass.php','function_with_branches','sample_object');

// Now the files containing actual code to be analyzed
include 'sampleclass.php';

// The following lines needs to be called somewhere before the script ends. These can be placed right after the codespy.php include statements too.
\codespy\Analyzer::$outputdir = 'g:\work\easyphp-5.3.6.1\www\crxml\output';
// Output directory to which the analyzer writes its output if using html format. Must be script writable.

\codespy\Analyzer::$outputformat = 'html';
// Output format. 

// Supported formats for path coverage:  html
// html : writes html files, one for each analyzed file that contain the sourcecode with executed lines highlighted in red.
//		  This is the only format currently supported for path coverage analysis.

// Supported formats for code coverage:  html,vim,php and text
// html : writes html files, one for each analyzed file that contain the sourcecode with executed lines highlighted in red.
// vim :  outputs vim command for each of the files that can be used to highlight the executed lines in a vim window displaying the respective source file
// php : outputs a 2 dimensional array in php format with lines executed for each of analyzed file.
// text : outputs the executed lines for each analyzed file

$o = new sample_object;
echo $o->function_with_branches(1);
echo $o->function_with_branches(2);
echo $o->function_with_branches(3);
echo $o->factorial(3);

//a function not analayzed.
echo $o->function_with_branches_2(2);

//Codespys destructor will write to stdout or files after the script terminates.
