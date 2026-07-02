# Experiments for "An efficiency-based effect of frequency on lexicalization: a dyadic experiment"

This repository contains the experimental code for Uegaki et al. "An efficiency-based effect of frequency on lexicalization: a dyadic experiment" in _Proceedings of CogSci 2026_. The experiments are coded in jsPsych library, with an additional python server-side implementation enabling dyadic tasks, as described in [Kenny Smith's course on online experiments](https://kennysmithed.github.io/oels2024/oels_practical_wk9.html). 

## Basic directory structure

The paper reports experiments in 4 conditions, which are furthermore divided into two counterbalancing manipulations regarding the frequency of shapes. The relevant 
experiment html files are located in the following locations:

- no-partner & distractor
    - triangle-frequent: experiment > non-interactive > non-interactive_tri > non-interactive_tri_dist.html
    - circle-frequent: experiment > non-interactive > non-interactive_circ > non-interactive_tri_dist.html
- no-partner & non-distractor
    - triangle-frequent: experiment > non-interactive > non-interactive_tri > non-interactive_tri_nondist.html
    - circle-frequent: experiment > non-interactive > non-interactive_circ > non-interactive_tri_nondist.html
- partner & distractor
    - triangle-frequent: experiment > interactive > interactive_tri > dyadic_interaction.html
    - circle-frequent: experiment > interactive > interactive_circ > dyadic_interaction.html
- partner & non-distractor
    - triangle-frequent: experiment > interactive > interactive_tri > dyadic_interaction_nondist.html
    - circle-frequent: experiment > interactive > interactive_circ > dyadic_interaction_nondist.html

