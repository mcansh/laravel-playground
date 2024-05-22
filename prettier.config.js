/** @type {import('prettier').Config} */
export default {
    phpVersion: "8.2",
    plugins: [
        "prettier-plugin-blade",
        "prettier-plugin-tailwindcss",
        "@prettier/plugin-php",
    ],
    overrides: [
        {
            files: ["*.blade.php"],
            options: {
                parser: "blade",
            },
        },
    ],
};
