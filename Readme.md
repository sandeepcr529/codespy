## Codespy 2.0: A code /path coverage analyzing tool in pure php. 

New in this version

* Added experimental **path coverage** analysis functionality.
* Rewrote the patcher from scratch to organize its operation as a series of passes. This makes fixing any bugs and adding / modifying the functionality a lot easier and faster.

**Code coverage analysis** means finding out which lines in a source code are actually getting executed. This is important because when writing unit tests, one should know how much code the tests are covering.

**Path coverage analysis** is sometimes required because, even if the execution has covered all code, it can do so by following different paths, executing different sections of code in numerous combinations. It is possible that some combination can cause unexpected behaviour. So it is sometimes necessary to check for all combinations that execution can follow from entering a function till returning from it.

Existing code coverage analyzing tools depends on xdebug functions to do the code coverage analysis. This is an attempt to accomplish the same without using xdebug.

**How to do path coverage analysis:**

* Download codespy.php.
* Include it in your project and add the functions to be analyzed for path coverage by calling function '_addFunctionToAnalyze_' **BEFORE** any of your files gets included. 
* Specify the output directory for codespy's html output files. Directory must be script writable.
* Execute your tests/ code via command line or from a browser.
* Codespy's destructor method will write the collected data to the output directory at the end of execution.

The path coverage analysis is done by splitting the body of functions into a number of nodes. Each node is a block of code that may or may not gets executed depending on the path taken by the execution. 

When codespy outputs the result of analysis, it marks the nodes in the generated html file as shown below.

![node-marker-image](http://i40.tinypic.com/rbxvdx.png)

Each node is numbered using big red numerals. 

Codespy can calculate the possible execution paths through these nodes by analyzing the structure of conditional statements and statements like return, break, continue etc. (goto statements are not currently taken into account.)

This is done by constructing a node tree from the source using this rule. A node 'B' is a child of another node 'A' only if execution of 'B' can follow the execution of 'A'.

This node tree is also displayed in the html output as shown below. 

![node-tree](http://i40.tinypic.com/sq47de.png)

The path coverage information is displayed in the generated html as shown below. 

![Path coverage output](http://i44.tinypic.com/1ghkxd.png)

**Possible execution paths:**
This is the number of ways a function can execute. in the above image it says 61. This means there are 61 unique execution paths through the function. Below this, codespy displays all the calculated paths.

**Paths Covered:**
This is the actual number paths that was covered through the function during the execution. Below this codespy lists the actual executed paths.

To try this out, 

* Download the files **codespy.php, sampleclass.php, test.php** to the same directory.
* Edit the file test.php to change the directory in line
    
    \codespy\Analyzer::$outputdir = 'g:\work\easyphp-5.3.6.1\www\crxml\output';

to some script writable directory in your system.

* Execute test.php using command line or from a browser.
* Open the file sampleclass.php.cc.html which will be written to your output directory in your browser to see the output as shown in the images above.

* Edit the file sampleclass.php to change the code and see the change reflected in the generated output.


**How to do code coverage analysis:**

Codespy can work only with included files. So you will have to include the target source file in the test-cases file. 
The output of codespy can be of 4 types.

Supported formats, html,vim,php and text

* **html** : writes html files, one for each analyzed file.**IMPORTANT** : Output directory must be set using  **\codespy\Analyzer::$outputdir**. 

The html file will contain the source code with executed lines highlighted in red. The number of times a line of code was executed will be displayed beside the line number. See the screenshot below.

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

