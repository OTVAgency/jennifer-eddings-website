import type { Metadata } from "next";
import { Geist, Geist_Mono } from "next/font/google";
import { headers } from "next/headers";
import "./globals.css";

const geistSans = Geist({
  variable: "--font-geist-sans",
  subsets: ["latin"],
});

const geistMono = Geist_Mono({
  variable: "--font-geist-mono",
  subsets: ["latin"],
});

export async function generateMetadata(): Promise<Metadata> {
  const headerStore = await headers();
  const host = headerStore.get("x-forwarded-host") ?? headerStore.get("host");
  const protocol = headerStore.get("x-forwarded-proto") ?? "https";
  const siteUrl = host ? `${protocol}://${host}` : undefined;

  return {
    title: "Jennifer Eddings | The Call Light Collective",
    description:
      "A personal brand website for Jennifer Eddings and The Call Light Collective, designed for storytelling, media visibility, and future collaborations.",
    icons: {
      icon: "/clc-monogram.png",
      shortcut: "/clc-monogram.png",
    },
    metadataBase: siteUrl ? new URL(siteUrl) : undefined,
    openGraph: siteUrl
      ? {
          title: "Jennifer Eddings | The Call Light Collective",
          description:
            "A personal brand website for Jennifer Eddings and The Call Light Collective, designed for storytelling, media visibility, and future collaborations.",
          url: siteUrl,
          siteName: "Jennifer Eddings",
          images: [
            {
              url: `${siteUrl}/og.png`,
              width: 1200,
              height: 630,
              alt: "Jennifer Eddings and The Call Light Collective social preview",
            },
          ],
        }
      : undefined,
    twitter: siteUrl
      ? {
          card: "summary_large_image",
          title: "Jennifer Eddings | The Call Light Collective",
          description:
            "A personal brand website for Jennifer Eddings and The Call Light Collective, designed for storytelling, media visibility, and future collaborations.",
          images: [`${siteUrl}/og.png`],
        }
      : undefined,
  };
}

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <body
        className={`${geistSans.variable} ${geistMono.variable} antialiased`}
      >
        {children}
      </body>
    </html>
  );
}
