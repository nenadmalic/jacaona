# Jačaona Website

Jačaona means “The House of the Strong” in Croatian.

Jačaona is the first sports incubator in Croatia. You can read more about it at https://jacaona.com.

This repository contains ongoing work to update the current Jačaona.com v2.0 website, which was initially published in March 2025. Version 2.0 introduced Jačaona’s visual identity, photography, and copywriting on top of the Colorlib Activar template. The template was purchased because its structure and sections met most of our website requirements, but it also introduced a significant amount of bloated code. At the time, the priority was to get a working prototype online, even if that meant accepting the bloat.

The goal of the v2.1 release is to refactor and optimize the codebase as much as possible, removing unnecessary complexity while keeping the site easy to maintain and deploy.

## Planned features for v2.1
- **Single template files** - Duplicate HTML is handled by PHP `include()` function
- **Multi-language support** - Croatian and English, with the option to easily add more languages
- **Tailwind CSS** - Used for responsive and maintainable styling
- **Minimal JavaScript** - No jQuery or heavy libraries, only lightweight vanilla JS where needed
- **Git-friendly structure** - Designed for simple deployment on traditional cPanel hosting

## Changelog

### v2.1 (In Progress)
- Refactored from Colorlib Activar template to custom PHP templates
- Implemented multi-language support (Croatian & English)
- Replaced bloated CSS/JS with Tailwind CSS and minimal vanilla JS
- Optimized code structure for cPanel deployment

### v2.0 (March 2025)
- Initial launch with Colorlib Activar template
- Implemented visual identity and copywriting