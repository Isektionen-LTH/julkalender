# julkalender

## Development

1. Run `docker build -t julkalender .` in the repository root to build the image
2. Run `docker run -it --rm -v $(pwd):/app -p 80:80 julkalender`


## Production

1. Run all the development commands to download the dependencies (or just run `yarn install` if you have that installed)
2. Add all pages in `src/luckor/` and upload the content in `src` to the web server (in a subdirectory like `julkalender` or wherever you want)
