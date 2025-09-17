# Claude Code Project Configuration

## PROJECT STRUCTURE - READ THIS FIRST

This repository contains TWO separate projects:

### 1. PRIMARY DEVELOPMENT TARGET: React Application
- **Location**: `accessibility-platform/` folder
- **Development Server**: `localhost:3001` (or `localhost:3002` if 3001 is occupied)
- **Tech Stack**: React, JavaScript, CSS
- **Purpose**: Main accessibility platform application
- **Start Command**: `cd accessibility-platform && PORT=3001 npm start`

### 2. WordPress Theme (Legacy/Reference)
- **Location**: `public_html/wp-content/themes/generatepress-child/`
- **Purpose**: WordPress theme files (NOT the primary development target)
- **Status**: Reference only - DO NOT modify unless explicitly requested

## CRITICAL DEVELOPMENT RULES

### Always Work on React App (localhost:3001)
- **ALL changes should be made to files in `accessibility-platform/src/`**
- **Test changes by viewing `http://localhost:3001`**
- **React components are in `accessibility-platform/src/components/`**
- **CSS files are in `accessibility-platform/src/components/` (component-specific)**
- **Page components are in `accessibility-platform/src/` (root level)**

### Never Assume WordPress
- When user asks to "add navigation", "fix styling", or "update components" - they mean the REACT app
- When user says "localhost" or "local development" - they mean the REACT app on port 3001
- WordPress files should only be touched if explicitly mentioned

### Git & Deployment
- **Git commits**: Only when explicitly requested by user
- **Deployment**: User handles deployment - focus on localhost:3001 development
- **Push to GitHub**: Only when user specifically asks

## COMMON NAVIGATION COMPONENTS

### React App Navigation
- **Primary Header**: `accessibility-platform/src/components/SimpleHeader.js`
- **Header CSS**: `accessibility-platform/src/components/SimpleHeader.css`
- **Navigation Config**: `accessibility-platform/src/config/navigationConfig.js` (may not be used by SimpleHeader)

### Key React Files
- **Main App**: `accessibility-platform/src/App.js`
- **Homepage**: HomePage component in `App.js`
- **Service Pages**: `accessibility-platform/src/AccessibilityAuditing.js`, `RemediationServices.js`, etc.

## DEVELOPMENT WORKFLOW

1. **Always check if React dev server is running**: `localhost:3001`
2. **If port 3001 is occupied**: Use `PORT=3002 npm start`
3. **Make changes to React files** in `accessibility-platform/src/`
4. **Test changes** by refreshing `localhost:3001` (or 3002)
5. **Only commit to git** when user explicitly requests it

## QUICK START COMMANDS

```bash
# Start React development server
cd accessibility-platform
PORT=3001 npm start

# If port 3001 is busy, use 3002
cd accessibility-platform
PORT=3002 npm start

# Check what's running on port 3001
netstat -an | findstr :3001
```

## TROUBLESHOOTING

- **If "localhost doesn't show changes"**: Verify you're editing React files, not WordPress files
- **If "navigation not updating"**: Check `SimpleHeader.js`, not `navigationConfig.js`
- **If confused about file location**: Everything for active development is in `accessibility-platform/src/`

---

**REMEMBER**: This is a React development project. WordPress files exist but are not the active development target.