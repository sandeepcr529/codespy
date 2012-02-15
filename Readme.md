## Codespy: A code coverage analyzing tool in pure php. 

Code coverage analysis means finding out which lines in a source code are actually getting executed. This is important because when writing unit tests, one should know how much code the tests are covering.

Existing code coverage analyzing tools depends on xdebug functions to do the code coverage analysis. This is an attempt to accomplish the same without using xdebug.

**Usage:**

Codespy can work only with included files. So you will have to include the target source file in the test-cases file. 
The output of codespy can be of 4 types.

Supported formats, html,vim,php and text

* **html** : writes html files, one for each analyzed file.**IMPORTANT** : Output directory must be set using  **\codespy\Analyzer::$outputdir**. 

The html file will contain the sourcecode with executed lines highlighted in red. The number of times a line of code was executed will be displayed beside the line number. See the screenshot below.

![Screenshot](http://i44.tinypic.com/4k76lx.png)



File extension .cc.html will be appended to filenames when writing into output directory.

* **vim** :  outputs vim command for each of the files that can be used to highlight the executed lines in a vim window displaying the respective source file.

* **php** : outputs a 2 dimensional array in php format with lines executed for each of analyzed file.

* **text** : outputs the executed lines for each analyzed file


For text and html output, the net code coverage in percentage shown at end of output for each file.


For trying codespy, you will need minimum of three files, which are

**codespy.php** 

**simpleclass.php**  -> The source file to analyze.

**test_cases.php**   -> The file with testcases.

test_cases.php should look like,

    <?php
    //You can include any files that dont need to be analyzed here ie before including codespy.php file
    include 'codespy.php'; 
    // All the files included after this will be analyzed for code coverage.
    // function addFileToSpy($path) can be used to restrict this to a set of specific files only.
    include 'sampleclass.php';
    
    \codespy\Analyzer::$outputdir = 'g:\work\easyphp-5.3.6.1\www\crxml\output';
    // Output directory to which the analyzer writes its output if using html format. Must be script writable.
    
    \codespy\Analyzer::$outputformat = 'html';
    // Output format. 
    // Supported formats, html,vim,php and text
    // html : writes html files, one for each analyzed file that contain the sourcecode with executed lines highlighted in red. Output directory must be set using  \codespy\Analyzer::$outputdir.
    // vim :  outputs vim command for each of the files that can be used to highlight the executed lines in a vim window displaying the respective source file
    // php : outputs a 2 dimensional array in php format with lines executed for each of analyzed file.
    // text : outputs the executed lines for each analyzed file
    
    $t = new sampleClass;
    echo $t->factorial(5);
    //Codespys destructor will write output to stdout or files after the script terminates.


After the script terminates, the codespy destructor will write the output to the standard output or files. If output format is html, just open the generated html files in a browser to see code coverage.

### The addFileToSpy Function.
This is a useful function that can limit the code analysis to a set of specified files. This can be useful if a project contains a large number of php files, but at time we are only interested in analyzing coverage of a particular file. 

A file can be added for analysis as
	
	include 'codespy.php';
    \codespy\Analyzer::addFileToSpy("/path/to/target/file");

This function should be called right after you include codespy.php.

By restricting analysis to a single file or a small number of files, the test can be run without much reduction in speed.

For testing, you can just download all the three files in to a directory, change the output dir in the test.php  and just run it to see its working. The html files should be written to the set output directory. Just open the file in browser to see code coverage.

