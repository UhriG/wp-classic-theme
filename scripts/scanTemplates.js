const fs = require('fs');
const path = require('path');

// Directories
const templateDir = path.join(__dirname, '../'); // Root theme directory
const scssDir = path.join(__dirname, '../assets/scss');
const jsDir = path.join(__dirname, '../assets/js');

// WordPress core template exceptions
const templateExceptions = ['header.php', 'footer.php', 'index.php', 'sidebar.php', 'functions.php', 'single.php', 'archive.php', 'page.php', 'search.php', '404.php', 'comments.php', 'style.php'];

// Function to get PHP templates
const getPhpTemplates = () => {
	return fs
		.readdirSync(templateDir)
		.filter((file) => file.endsWith('.php'))
		.filter((file) => !templateExceptions.includes(file));
};

// Function to create missing SCSS/JS files
const ensureAssetsExist = (template) => {
	const baseName = template.replace('.php', '');
	const scssFile = path.join(scssDir, `${baseName}.scss`);
	const jsFile = path.join(jsDir, `${baseName}.js`);

	// Create SCSS file if it doesn't exist
	if (!fs.existsSync(scssFile)) {
		fs.writeFileSync(scssFile, `/* Styles for ${baseName} */\n`, 'utf8');
		console.log(`Created: ${scssFile}`);
	}

	// Create JS file if it doesn't exist
	if (!fs.existsSync(jsFile)) {
		fs.writeFileSync(jsFile, `// Scripts for ${baseName}\nconsole.log('${baseName} loaded');\n`, 'utf8');
		console.log(`Created: ${jsFile}`);
	}
};

// Main script
const run = () => {
	console.log('Scanning for PHP templates...');
	const templates = getPhpTemplates();
	templates.forEach((template) => ensureAssetsExist(template));
	console.log('Asset generation complete.');
};

run();
