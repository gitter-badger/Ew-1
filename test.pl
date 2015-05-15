use Dancer;
get '/' => sub {
return '<html>
<head>
<title>
Perl testing
</title>
</head>
<body>
Hello World
</body>
</html>
';
};
start;