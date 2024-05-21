/** @type {import('prettier').Config} */
export default {
    plugins: ["prettier-plugin-blade", "prettier-plugin-tailwindcss"],
    overrides: [
        {
            files: ["*.blade.php"],
            options: {
                parser: "blade",
            },
        },
    ],
};
