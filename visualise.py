import matplotlib.pyplot as plt
import pandas as pd

x = [600,1600,1800,800,830,830,1000,1600]  # This is the values extracted from the database for vehicle type of user
bar_value = 1599  # This is the value entered by the user
x.append(bar_value)
x = pd.Series(x)

p = x.plot(kind="hist", color="blue")

idx = 0
min_dist = float("inf")
for i, rect in enumerate(p.patches):
	temp = abs((rect.get_x()+(rect.get_width()*(1/2)))-bar_value)
	if(temp<min_dist):
		min_dist=temp
		idx = i
p.patches[idx].set_color('r')
plt.show()
