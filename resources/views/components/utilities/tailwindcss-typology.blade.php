<section class="py-16">
    <div class="container mx-auto">
        <h2 class="mb-12 text-center text-3xl font-bold">Typography Showcase</h2>

        <div class="prose max-w-none">
            <!-- Headings -->
            <div class="mb-12">
                <h3 class="mb-6 text-xl font-semibold">Heading Elements</h3>
                <div class="not-prose mb-4">
                    <div class="text-xs text-gray-500">h1 Heading</div>
                </div>
                <h1>Heading Level 1</h1>

                <div class="not-prose mt-6 mb-4">
                    <div class="text-xs text-gray-500">h2 Heading</div>
                </div>
                <h2>Heading Level 2</h2>

                <div class="not-prose mt-6 mb-4">
                    <div class="text-xs text-gray-500">h3 Heading</div>
                </div>
                <h3>Heading Level 3</h3>

                <div class="not-prose mt-6 mb-4">
                    <div class="text-xs text-gray-500">h4 Heading</div>
                </div>
                <h4>Heading Level 4</h4>

                <div class="not-prose mt-6 mb-4">
                    <div class="text-xs text-gray-500">h5 Heading</div>
                </div>
                <h5>Heading Level 5</h5>

                <div class="not-prose mt-6 mb-4">
                    <div class="text-xs text-gray-500">h6 Heading</div>
                </div>
                <h6>Heading Level 6</h6>
            </div>

            <!-- Paragraph and Text Formatting -->
            <div class="mb-12">
                <h3 class="mb-6 text-xl font-semibold">Paragraph & Text Formatting</h3>

                <div class="not-prose mb-4">
                    <div class="text-xs text-gray-500">Standard Paragraph</div>
                </div>
                <p>
                    This is a standard paragraph with regular text. The Tailwind Typography plugin adds sensible
                    defaults to all common prose elements. This text demonstrates the standard paragraph styling with
                    appropriate line height, font size, and margins.
                </p>

                <div class="not-prose mt-6 mb-4">
                    <div class="text-xs text-gray-500">Text with Formatting</div>
                </div>
                <p>
                    Text can be
                    <strong>bold</strong>
                    ,
                    <em>italic</em>
                    , or
                    <strong><em>both</em></strong>
                    . You can also add
                    <a href="#">links</a>
                    within text that follow your theme colors. For code references, use
                    <code>inline code</code>
                    formatting.
                </p>

                <div class="not-prose mt-6 mb-4">
                    <div class="text-xs text-gray-500">Lead Paragraph</div>
                </div>
                <p class="lead">
                    This is a lead paragraph that stands out from regular text, often used for introductions or
                    important summary content at the beginning of articles or sections.
                </p>
            </div>

            <!-- Lists -->
            <div class="mb-12">
                <h3 class="mb-6 text-xl font-semibold">Lists</h3>

                <div class="not-prose mb-4">
                    <div class="text-xs text-gray-500">Unordered List</div>
                </div>
                <ul>
                    <li>First unordered list item</li>
                    <li>
                        Second unordered list item with some additional text to show how wrapping works with the
                        typography styling
                    </li>
                    <li>
                        Third unordered list item
                        <ul>
                            <li>Nested unordered list item</li>
                            <li>Another nested item</li>
                        </ul>
                    </li>
                    <li>Fourth unordered list item</li>
                </ul>

                <div class="not-prose mt-6 mb-4">
                    <div class="text-xs text-gray-500">Ordered List</div>
                </div>
                <ol>
                    <li>First ordered list item</li>
                    <li>
                        Second ordered list item with some additional text to demonstrate line wrapping and spacing in
                        ordered lists
                    </li>
                    <li>
                        Third ordered list item
                        <ol>
                            <li>Nested ordered list item</li>
                            <li>Another nested item</li>
                        </ol>
                    </li>
                    <li>Fourth ordered list item</li>
                </ol>
            </div>

            <!-- Blockquotes -->
            <div class="mb-12">
                <h3 class="mb-6 text-xl font-semibold">Blockquotes</h3>

                <div class="not-prose mb-4">
                    <div class="text-xs text-gray-500">Standard Blockquote</div>
                </div>
                <blockquote>
                    <p>
                        This is a blockquote that stands out from the regular text. It's commonly used for quotes or
                        highlighting important information that should be visually distinct from surrounding content.
                    </p>
                </blockquote>

                <div class="not-prose mt-6 mb-4">
                    <div class="text-xs text-gray-500">Blockquote with Citation</div>
                </div>
                <blockquote>
                    <p>
                        Good design is as little design as possible. Less, but better – because it concentrates on the
                        essential aspects, and the products are not burdened with non-essentials.
                    </p>
                    <cite>— Dieter Rams</cite>
                </blockquote>
            </div>

            <!-- Code -->
            <div class="mb-12">
                <h3 class="mb-6 text-xl font-semibold">Code Formatting</h3>

                <div class="not-prose mb-4">
                    <div class="text-xs text-gray-500">Inline Code</div>
                </div>
                <p>
                    To install Tailwind, run
                    <code>npm install tailwindcss</code>
                    and then initialize with
                    <code>npx tailwindcss init</code>
                    .
                </p>

                <div class="not-prose mt-6 mb-4">
                    <div class="text-xs text-gray-500">Code Block</div>
                </div>
                <pre><code>// Tailwind Typography Configuration
            module.exports = {
              theme: {
                extend: {
                  typography: {
                    DEFAULT: {
                      css: {
            color: '#333',
            a: {
              color: '#3182ce',
              '&:hover': {
                color: '#2c5282',
              },
            },
                      },
                    },
                  },
                },
              },
              plugins: [
                require('@tailwindcss/typography'),
              ],
            }</code></pre>
            </div>

            <!-- Tables -->
            <div class="mb-12">
                <h3 class="mb-6 text-xl font-semibold">Table Formatting</h3>

                <div class="not-prose mb-4">
                    <div class="text-xs text-gray-500">Standard Table</div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>CEO</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>CTO</td>
                            <td>jane@example.com</td>
                        </tr>
                        <tr>
                            <td>James Johnson</td>
                            <td>Designer</td>
                            <td>james@example.com</td>
                        </tr>
                        <tr>
                            <td>Emily Davis</td>
                            <td>Developer</td>
                            <td>emily@example.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Figure and Images -->
            <div class="mb-12">
                <h3 class="mb-6 text-xl font-semibold">Figures & Images</h3>

                <div class="not-prose mb-4">
                    <div class="text-xs text-gray-500">Figure with Caption</div>
                </div>
                <figure>
                    <img src="https://placehold.co/800x400/e6e6e6/999999?text=Figure+Example" alt="Example figure" />
                    <figcaption>A sample image with figure caption styling</figcaption>
                </figure>
            </div>

            <!-- Horizontal Rule -->
            <div class="mb-12">
                <h3 class="mb-6 text-xl font-semibold">Horizontal Rule</h3>

                <div class="not-prose mb-4">
                    <div class="text-xs text-gray-500">Standard HR</div>
                </div>
                <p>Content before the horizontal rule</p>
                <hr />
                <p>Content after the horizontal rule</p>
            </div>

            <!-- Color Variants -->
            <div class="mb-12">
                <h3 class="mb-6 text-xl font-semibold">Color Variants</h3>

                <div class="not-prose mb-4">
                    <div class="text-xs text-gray-500">Color Themed Prose</div>
                </div>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="prose rounded-lg bg-blue-50 p-6 prose-blue">
                        <h4>Blue Theme</h4>
                        <p>
                            This is content with the blue color theme applied.
                            <a href="#">Links</a>
                            and other elements follow the blue color palette.
                        </p>
                    </div>
                    <div class="prose rounded-lg bg-emerald-50 p-6 prose-emerald">
                        <h4>Emerald Theme</h4>
                        <p>
                            This is content with the emerald color theme applied.
                            <a href="#">Links</a>
                            and other elements follow the emerald color palette.
                        </p>
                    </div>
                    <div class="prose rounded-lg bg-pink-50 p-6 prose-pink">
                        <h4>Pink Theme</h4>
                        <p>
                            This is content with the pink color theme applied.
                            <a href="#">Links</a>
                            and other elements follow the pink color palette.
                        </p>
                    </div>
                    <div class="prose rounded-lg bg-amber-50 p-6 prose-amber">
                        <h4>Amber Theme</h4>
                        <p>
                            This is content with the amber color theme applied.
                            <a href="#">Links</a>
                            and other elements follow the amber color palette.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Size Variants -->
            <div class="mb-12">
                <h3 class="mb-6 text-xl font-semibold">Size Variants</h3>

                <div class="not-prose mb-4">
                    <div class="text-xs text-gray-500">Prose Size Examples</div>
                </div>
                <div class="space-y-6">
                    <div class="prose prose-sm rounded-lg border border-gray-200 p-4">
                        <h4>Small Size (prose-sm)</h4>
                        <p>
                            This is a demonstration of smaller typography using
                            <code>prose-sm</code>
                            . Notice the reduced font size, line height, and spacing.
                        </p>
                    </div>
                    <div class="prose rounded-lg border border-gray-200 p-4">
                        <h4>Default Size</h4>
                        <p>
                            This is a demonstration of default typography size. This is the standard size used across
                            the application.
                        </p>
                    </div>
                    <div class="prose prose-lg rounded-lg border border-gray-200 p-4">
                        <h4>Large Size (prose-lg)</h4>
                        <p>
                            This is a demonstration of larger typography using
                            <code>prose-lg</code>
                            . Notice the increased font size, line height, and spacing.
                        </p>
                    </div>
                    <div class="prose prose-xl rounded-lg border border-gray-200 p-4">
                        <h4>Extra Large Size (prose-xl)</h4>
                        <p>
                            This is a demonstration of extra large typography using
                            <code>prose-xl</code>
                            . Notice the even larger font size, line height, and spacing.
                        </p>
                    </div>
                    <div class="prose prose-2xl rounded-lg border border-gray-200 p-4">
                        <h4>2XL Size (prose-2xl)</h4>
                        <p>
                            This is a demonstration of the largest typography size using
                            <code>prose-2xl</code>
                            . Notice the much larger font size, line height, and spacing.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
